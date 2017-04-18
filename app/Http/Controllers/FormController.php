<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreForm;
use App\Form as Form;
use App\User as User;
use Auth;
use Gate;
use Illuminate\Auth\AuthManager;

class FormController extends Controller
{
    private $auth ;

    /**
     * for dependency injection
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth ;
    }

    /**
     * Display a listing of the forms of current user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::getAll($this->auth->user()->id)->paginate(10);
        return view('form.index' , compact('forms')) ;
    }

    /**
     * Show the form for creating a new form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created form in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm $request)
    {
        $requests = $request->all() ;
        $requests['user_id'] = $this->auth->user()->id;
        $requests['link'] = str_random(8);
        $form = Form::store($requests);
        return redirect()->route('form.show' , ['form' => $form->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }   
        return view('form.show' , compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        return view('form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreForm $request, Form $form)
    {
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        $form->patch($request->all());
        return redirect()->route('form.show' , ['form' => $form->id]);
    }

    /**
     * Remove the specified resource form storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        
        $form->delete();
        return redirect()->route('form.index');
    }
}
