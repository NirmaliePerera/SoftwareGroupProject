<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmed;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create() //create appointment
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'message' => 'nullable',
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->withErrors('User is not authenticated.');
        }

         $appointment = new Appointment([
            'user_id' => $userId,
            'date' => $request->date,
            'email' => $request->email,
            'time' => $request->time,
            'service' => $request->service,
            'message' => $request->message,
            'status' => 'pending',
    
         ]);
        $appointment->save();
            
        // Send confirmation email
        Mail::to($appointment->email)->send(new AppointmentConfirmed($appointment));

        return view('appointments.after_create')->with('success', 'Appointment created successfully!');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'message' => 'nullable',
            'status' => 'required',
            
        ]);

        

        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->email = $request->input('email');
        $appointment->service = $request->input('service');
        $appointment->message = $request->input('message');
        $appointment->status = $request->input('status');
     

        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment information updated successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }
}