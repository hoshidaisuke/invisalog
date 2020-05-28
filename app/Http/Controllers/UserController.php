<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clinic;
use App\Http\Requests\MypageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mypage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MypageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MypageRequest $request)
    {
        // FormRequestからデータを取得
        // https://laravel.com/docs/7.x/validation#form-request-validation
        $form = $request->validated();

        // 複数テーブルへの処理を行う為、トランザクションをはる
        // https://laravel.com/docs/7.x/database#database-transactions
        DB::transaction(function () use($form) {
            // usersテーブルの更新
            $user = Auth::user();
            $user->fill($form)->save();

            // https://laravel.com/docs/7.x/eloquent#other-creation-methods
            $clinic = Clinic::updateOrCreate($form['clinic'], []);

            // Reviewとのリレーションを貼る前提
            $user->review()->updateOrCreate(
                [ 'clinic_id' => $clinic->id ],
                $form['review']
            );
            return redirect('mypage/index');
        });

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
