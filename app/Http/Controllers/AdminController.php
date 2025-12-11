<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Worker;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('main-content.content');
            } else if ($usertype == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login');
            }
        }
        return redirect()->route('login');
    }
    public function dashboard()
    {
        return view('profile.admin');
    }
    public function mainService()
    {
        $Services = Service::all();
        return view('serviceCrud.mainService', compact('Services'));
    }
    public function createService(){
        return view('serviceCrud.createService');
    }
    public function storeService(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/serviceIcons/', $filename);
            $validatedData['image'] ='uploads/ServiceIcons/'.$filename;
        }
        else{
            $validatedData['image'] = null;
        }

         Service::create([
             'name' => $validatedData['name'],
             'price'=> $validatedData['price'],
             'image' => $validatedData['image'],
         ]);

         return redirect()->route('serviceCrud.mainService')->with('serviceCreate', 'Үйлчилгээ амжилттай нэмэгдлээ.');
    }


    public function editService($id) {
        $service = Service::findOrFail($id);
        return view('serviceCrud.editService', compact('service'));
    }

    public function updateService(Request $request, $id) {
        $service = Service::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($service->image))) {
                File::delete(public_path($service->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/serviceIcons/'), $filename);
            $validatedData['image'] = 'uploads/serviceIcons/' . $filename;
        }

        $service->update($validatedData);

        return redirect()->route('serviceCrud.mainService')
            ->with('serviceUpdate', 'Үйлчилгээ амжилттай шинчлэгдлээ.');
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('serviceCrud.mainService')->with('serviceDelete', 'Үйлчилгээ амжилттай устгагдлаа.');
    }
    public function question($id)
    {
        $service = Service::findOrFail($id);  // Fetch the correct service
        $questions = $service->questions;  // Get questions related to this service
        return view('questionCrud.question', compact('service', 'questions'));
    }
    public function createQuestion($id)
    {
        $service = Service::findOrFail($id);
        return view('questionCrud.createQuestion', compact('service'));
    }

    public function storeQuestion(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
        ]);

        Question::create([
            'service_id' => $id,
            'question' => $validatedData['question'],
        ]);

        return redirect()->route('questionCrud.question', $id)->with('questionCreate', 'Асуулт амжилттай нэмэгдлээ.');
    }
    public function editQuestion($id)
    {
        $question = Question::findOrFail($id);
        return view('questionCrud.editQuestion', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'question' => $validatedData['question'],
        ]);

        return redirect()->route('questionCrud.question', $question->service_id)
            ->with('questionUpdate', 'Асуулт амжилттай шинчлэгдлээ.');
    }
    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $serviceId = $question->service_id; // Store service ID before deletion
        $question->delete();

        return redirect()->route('questionCrud.question', $serviceId)
            ->with('questionDelete', 'Асуулт амжилттай устгагдлаа.');
    }

    public function answer($id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('answerCrud.answer', compact('question', 'answers'));
    }
    public function createAnswer($id)
    {
        // Just pass the question ID, not an answer object
        $question = Question::findOrFail($id);
        return view('answerCrud.createAnswer', compact('question'));
    }

    public function storeAnswer(Request $request, $questionId)
    {
        $validatedData = $request->validate([
            'answer' => 'required',
        ]);

        Answer::create([
            'question_id' => $questionId,
            'answer' => $validatedData['answer'],
        ]);

        return redirect()->route('answerCrud.answer', $questionId)
            ->with('answerCreate', 'Хариулт амжилттай нэмэгдлээ.');
    }
    public function editAnswer($id)
    {
        $answer = Answer::findOrFail($id);
        return view('answerCrud.editAnswer', compact('answer'));
    }

    public function updateAnswer(Request $request, $id)
    {
        $validatedData = $request->validate([
            'answer' => 'required',
        ]);

        $answer = Answer::findOrFail($id);
        $answer->update([
            'answer' => $validatedData['answer'],
        ]);

        return redirect()->route('answerCrud.answer', $answer->question_id)
            ->with('answerUpdate', 'Хариулт амжилттай шинчлэгдлээ.');
    }
    public function destroyAnswer($id)
    {
        $answer = Answer::findOrFail($id);
        $questionId = $answer->question_id; // Store the question ID before deleting
        $answer->delete();

        return redirect()->route('answerCrud.answer', $questionId)
            ->with('answerDelete', 'Хариулт амжилттай устгагдлаа.');
    }

    public function userDisplay(){
        $Users = User::all();
        return view('userCrud.userDisplay', compact('Users'));
    }
    public function userEdit($id) {
        $user= User::findOrFail($id);
        return view('userCrud.userEdit', compact('user'));
    }

    public function userUpdate(Request $request, $id) {
        $user= User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required',
            'usertype'=> 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('userCrud.userDisplay')
            ->with('userUpdate', 'Хэрэглэгчийн мэдээллийг амжилттай шинчлэгдлээ.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('userCrud.userDisplay')->with('userDelete', 'Хэрэглэгчийн мэдээллийг амжилттай устгагдлаа.');
    }
    public function orderDisplay()
    {
        $orders = Order::all();
        return view('orderCrud.orderDisplay', compact('orders'));
    }

    public function orderEdit($id) {
        $order= Order::findOrFail($id);
        return view('orderCrud.orderEdit', compact('order'));
    }
    public function orderUpdate(Request $request, $id) {
        $order= Order::findOrFail($id);

        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'answers' => 'required|string',  // JSON encoded string
            'address' => 'required|string|max:255',
            'feedback' => 'nullable|string',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:15',
        ]);

        $validatedData['answers'] = json_decode($validatedData['answers'], true);
        $order->update($validatedData);

        return redirect()->route('orderCrud.orderDisplay')
            ->with('orderUpdate', 'Захиалгийн мэдээллийг амжилттай шинчлэгдлээ.');

    }
    public function orderDestroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orderCrud.orderDisplay')->with('orderDelete', 'Захиалгийн мэдээллийг амжилттай устгагдлаа.');
    }
    public function applicationDisplay(){
        $applications = Application::all();
        return view('applicationJob.applicationDisplay', compact('applications'));
    }
    public function workerDisplay()
    {
        $workers = Worker::all();
        return view('workerCrud.workerDisplay', compact('workers'));
    }
    public function workerCreate(){
        return view('workerCrud.workerCreate');
    }
    public function workerStore(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'job'       => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:workers,email',
            'phone'     => 'required|string|max:15',
            'gender'    => 'required|string',
            'age'       => 'required|integer|min:1',
            'address'   => 'required|string|max:255',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $imagePath = 'uploads/employee/' . $imageName;
        $request->file('image')->move(public_path('uploads/employee'), $imageName);

        Worker::create([
            'image'     => $imagePath,
            'firstname' => $validatedData['firstname'],
            'lastname'  => $validatedData['lastname'],
            'job'       => $validatedData['job'],
            'email'     => $validatedData['email'],
            'phone'     => $validatedData['phone'],
            'gender'    => $validatedData['gender'],
            'age'       => $validatedData['age'],
            'address'   => $validatedData['address'],
        ]);

        return redirect()->route('workerCrud.workerDisplay')->with('workerCreate', 'Ажилчин амжилттай нэмэгдэлээ.');
    }

    public function workerEdit($id)
    {
        $worker = Worker::findOrFail($id);
        return view('workerCrud.workerEdit', compact('worker'));
    }
    public function workerUpdate(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'job'       => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:workers,email,' . $worker->id,
            'phone'     => 'required|string|max:15',
            'gender'    => 'required|string',
            'age'       => 'required|integer|min:1',
            'address'   => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/worker'), $imageName);
            $worker->image = 'uploads/worker/' . $imageName;
        }

        $worker->update($validatedData);

        return redirect()->route('workerCrud.workerDisplay')->with('workerUpdate', 'Ажилчний мэдээлэл амжилттай шинчлэгдлээ.');
    }
    public function workerDestroy($id)
    {
        $worker = Worker::findOrFail($id);
        $worker->delete();
        return redirect()->route('workerCrud.workerDisplay')->with('workerDelete', 'Ажилчний мэдээлэл амжилттай устгагдлаа.');
    }
    public function paymentCreate()
    {
        return view('payment.paymentCreate');
    }
    public function paymentStore(Request $request)
    {
        $request->validate([
            'instruction' => 'required|string',
            'warning' => 'required|string',
            'qr_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $qrImagePath = time() . '_' . $request->file('qr_image')->getClientOriginalName();
        $qrImagePath = 'uploads/QR/' . $qrImagePath;

        $request->file('qr_image')->move(public_path('uploads/QR'), $qrImagePath);

        Payment::create([
            'instruction' => $request->instruction,
            'warning' => $request->warning,
            'qr_image' => $qrImagePath,
        ]);

        return redirect()->route('payment.paymentCreate')->with('success', 'Payment created successfully!');
    }

    public function sendInfo($id) {
        $order = Order::findOrFail($id);
        $workers = Worker::all();
        return view('workerInfo.sendInfo', compact('order', 'workers'));
    }
    public function assignWorker(Request $request, $orderId)
    {
        $request->validate([
            'worker_id' => 'required|exists:workers,id',
            'worker_firstname' => 'required|string|max:255',
            'worker_lastname' => 'required|string|max:255',
            'worker_job' => 'nullable|string|max:255',
            'worker_age' => 'nullable|integer',
            'worker_gender' => 'nullable|string|max:50',
            'worker_phone' => 'nullable|string|max:15',
        ]);

        $order = Order::findOrFail($orderId);
        $order->employee_id = $request->worker_id;

        $order->save();

        return redirect()->route('workerInfo.sendInfo', ['id' => $orderId])->with('sendSuccess', 'Ажилчнийг амжилттай томиллоо.');
    }

}
