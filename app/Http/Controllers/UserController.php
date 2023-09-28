<?php

namespace App\Http\Controllers;

use App\Mail\Invoice as AppInvoice;
use App\Mail\Receipt;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Inquiry;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // index
    public function index()
    {
        // $courses = Course::all();
        // return view('user.course.index', compact('courses'));
        return view('user.course.index');
    }

    public function indexCourseRegistration()
    {

        if (auth()->user()->courseRegistrations()) {
            $course_registrations = auth()->user()->courseRegistrations()->latest()->simplePaginate(5);
            return view('dashboard', compact('course_registrations'));
        } else {
            return view('dashboard');
        }
    }

    public function viewRegistration($id)
    {
        $course_registration = CourseRegistration::find($id);
        return view('user.register.view', compact('course_registration'));
    }

    // register form
    public function registerForm()
    {
        $courses = Course::all();
        if (Course::latest()->first()) {
            $course_id = Course::latest()->first()->id;
            return view('user.register.create', compact('courses', 'course_id'));
        } else {
            $course_id = null;
            return view('user.register.create', compact('courses', 'course_id'));
        }
    }

    // register selected course
    public function registerSelectedCourse($id)
    {
        $course_id = $id;
        return view('user.register.create', compact('course_id'));
    }

    // store function
    public function store()
    {
        $course_registration = new CourseRegistration();
        $course_registration->user_id = auth()->user()->id;
        // dd(request()->has('is_sponsored'));

        $course_registration->fill(request()->all());

        $course_registration->is_sponsored = request()->has('is_sponsored') ? 1 : 0;
        // return $course_registration->is_sponsored;

        if ($course_registration->save()) {
            $invoice = new Invoice();
            $invoice->course_registration_id = $course_registration->id;
            if($invoice->save()) {

                $invoice_data = [
                    'id' => $invoice->id,
                    'date' => $invoice->created_at->format('d-m-Y'),
                    'user_name' => $invoice->courseRegistration->name,
                    'user_address' => $invoice->courseRegistration->address,
                    'course_name' => $invoice->courseRegistration->course->name,
                    'fee' => $invoice->courseRegistration->course->fee,
                    'user_id' => $invoice->user_id
                ];

                $invoice_mail = new AppInvoice($invoice_data);

                // dd($invoice_mail);

                Mail::to(auth()->user()->email)->send($invoice_mail);

                return view('user.register.invoice', compact('invoice'));
            }
        } else {
            dd('failed');
        }
    }

    public function checkout($id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $invoice = Invoice::find($id);

        $session = $stripe->checkout->sessions->create([

            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'unit_amount' => $invoice->courseRegistration->course->fee * 100,
                    'product_data' => [
                        'name' => $invoice->courseRegistration->course->name,
                        'images' => ['https://picsum.photos/600'],
                    ],
                ],
                'quantity' => 1,
            ]],
            'customer_email' => auth()->user()->email,
            'client_reference_id' => $invoice->id,
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'payment_method_types' => [request()->payment_method],
        ]);

        return redirect()->away($session->url);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $session->url);

    }

    public function success()
    {
        // Initialize Stripe with your secret key

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->sessions->retrieve(request()->query('session_id'));

        $invoice = auth()->user()->courseRegistrations->last()->invoice->first();
        $invoice->payment_id = $session->id;
        $invoice->payment_method = $session->payment_method_types[0];

        $invoice_data = [
            'id' => $invoice->id,
            'date' => $invoice->created_at->format('d-m-Y'),
            'user_name' => $invoice->courseRegistration->name,
            'user_address' => $invoice->courseRegistration->address,
            'course_name' => $invoice->courseRegistration->course->name,
            'fee' => $invoice->courseRegistration->course->fee,
            'user_id' => $invoice->user_id
        ];

        $receipt_mail = new Receipt($invoice_data);

        Mail::to(auth()->user()->email)->send($receipt_mail);

        if ($invoice->save()) {
            return view('user.register.receipt', compact('session', 'invoice'));
        } else {
            dd('failed');
        }

        // Handle your application logic based on the payment status
        // Redirect to a thank-you page or display success message

    }

    public function storeInquiry(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->fill($request->all());
        if ($inquiry->save()) {
            return redirect()->back();
        } else {
            dd('failed to save');
        }
    }

}
