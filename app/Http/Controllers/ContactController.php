<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendAppointment;
use App\Mail\SendJob;
use App\Mail\SendContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\ServicesCategory;
use App\Salon;
use Illuminate\Support\Facades\Input;
use DB;
// use App\Http\Controllers\Newsletter;

class ContactController extends Controller
{
    
    
    public function contact()
    {

        $salons = Salon::get();
      return view('contact', [

            'salons'=>$salons,
        ]);
      
      
    }

    public function send_contact(Request $request){
        $contact_email = settings('site.appointment-email');
        $form_data = $request->only(['name','number','email','salons','message','terms']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],         
            'number'    => ['required','min:3'],
            'message'    => ['required','min:3'],
            'salons'    => ['required'],
            'terms'   => ['required'],
            
        ];
  
        $validationMessages = [
            'name.min'=>'Name is required',
            'email.email'=>'Please insert a valid email',
            'message.min'=>'Please insert a message',
            'number.min'=>'Please insert your phone number',
            'salons.required'=>'Please select a salon',
            'terms.required'=>'Please accept our terms',
  
        ];
  
        $validator = Validator::make($form_data, $validationRules,$validationMessages);
        if ($validator->fails())
            return ['success' => false, 'error' => $validator->errors()->all()];  
        else{ 
            Mail::to(strip_tags($contact_email))->send(new SendContact($request->all()));
  
            return ['success' => true,'successMessage'=> __('site.form-message')];
        }      
    }

    public function send_appointment(Request $request){
      $contact_email = settings('site.appointment-email');
      $form_data = $request->only(['gender','name','email','number','service','salons','date','hour','message','terms']);
      $validationRules = [
          'gender'    => ['required'],
          'name'    => ['required','min:3'],
          'email'   => ['required','email'],         
          'number'    => ['required','min:3'],
          'message'    => ['required','min:3'],
          'service'    => ['required'],
          'salons'    => ['required'],
          'date'    => ['required'],
          'hour'    => ['required'],
          'terms'   => ['required'],
          
      ];

      $validationMessages = [
          'name.min'=>'Name is required',
          'email.email'=>'Please insert a valid email',
          'message.min'=>'Please insert a message',
          'number.min'=>'Please insert your phone number',
          'service.min'=>'Please select a service',
          'salons.required'=>'Please select a salon',
          'date.required'=>'Please select a date',
          'hour.required'=>'Please pick an hour',
          'terms.required'=>'Please accept our terms',
          'gender.required'=>'Please select a gender',

      ];

      $validator = Validator::make($form_data, $validationRules,$validationMessages);
      if ($validator->fails())
          return ['success' => false, 'error' => $validator->errors()->all()];  
      else{ 
          Mail::to(strip_tags($contact_email))->send(new SendAppointment($request->all()));

          return ['success' => true,'successMessage'=> __('site.appointment')];
      }      
  }

    public function subscribeNewsletter(Request $request) {   
        $form_data = $request->only(['email', 'termeni']);
        $validationRules = [
            'email'   => ['required','email', 'unique:newsletters'],
            'termeni'   => ['required'],
        ];

        $validationMessages = [
            'email.email'    => "Please insert a valid :attribute address!",
            'email.unique'    => "you have already been subscribed!",
            'email.required'    => "Email field is required!",
            'termeni.required'    => "You must accept our terms and conditions!",
        ];
        $validator = Validator::make($form_data, $validationRules, $validationMessages);
        if(!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)){
        return ['success' => false, 'msg_email' => 'Please insert an email address! Ex: email@email.com'];
        }
        if ($validator->fails())
            return ['success' => false, 'msg_email' => $validator->errors()->all()];  
        else{
        $email = $request->input('email');
        $id_inserat = DB::table('newsletters')->insertGetId(['email' => $email]);
        // Newsletter::subscribe($email);
        
        if($id_inserat){
            return ['success' => true, 'msg_email' => "You have been subscribed!"];
        }
        else{
            return ['success' => false, 'msg_email' => "An error occur! Please try again!"];
        }
        } 
    } 

    public function submit_file(Request $request){
        $contact_email = settings('site.job-email');
    
        $form_data = $request->only(['name','email','number','job','cv','salons','message','terms']);
        $validationRules = [
        'name'    => ['required','min:3'],
        'email'   => ['required','email'],         
        'number'    => ['required','min:3'],
        'message'    => ['required','min:3'],
        'job'    => ['required'],
        'salons'    => ['required'],
        'terms'    => ['required'],
        'cv'    => ['required'],
        ];
        
        $validationMessages = [
        'name.min'=>'Name is required',
        'email.email'=>'Please insert a valid email',
        'message.min'=>'Please insert a message',
        'number.min'=>'Please insert your phone number',
        'job.required'=>'Please select a job',
        'salons.required'=>'Please select a salon',
        'cv.required'=>'Please insert a cv',
        'terms.required'=>'Please accept our terms',
        ];
        // Get the uploades file with name document
         $document = null;
         if($request->file('cv')){ 
          $document = Input::file('cv');
         
          if ($document->getError() == 1) {
               $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
               $error = 'CV-ul trebuie sa fie mai mic de ' . $max_size . 'Mb.';
               return ['success' => false, 'msg' => $error];  
           }
           
           if ($document->getClientMimeType() !== 'application/pdf')
           {
             return ['success' => false, 'msg' => 'Va rugam sa incarcati un fisier de tip pdf!'];  
           }
         }
         
      
         $date_de_trimis = [
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'number' => $request->input('number'),
             'job' => $request->input('job'),
             'salons' => $request->input('salons'),
             'message' => $request->input('message'),
             'phone' => $request->input('phone'),
             'cv' => $document,

            //  'job' => $jobname,
           ];
         
           $validator = Validator::make($form_data, $validationRules, $validationMessages);
           if ($validator->fails())
               return ['success' => false, 'msg' => $validator->errors()->all()];  
           else{
               Mail::to(strip_tags($contact_email))->send(new SendJob($date_de_trimis));
               return ['success' => true,'msg'=>'Mesajul a fost trimis cu succes'];
           }
                 
       }
}