<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\SearchRequest;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $members = Member::where("kana_name", "like", $request->search. "%")->paginate(5);

        // // ペジネーションリンク追加のために変数に代入
        // $search = $request->search;

        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {
        return view('members.create', ['member' => $member]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $member = new Member();
        $member->fill($request->all());
        $member->save();

        return redirect()->route('members.show', $member);
    }

    /**
     * Display the specified resource.
     *
     * @param App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        $member->fill($request->all())->save();
        return redirect()->route('members.show', $member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }

    public function search(SearchRequest $request)
    {
        $members = Member::where("kana_name", "like", $request->search. "%")->paginate(5);

        // ペジネーションリンク追加のために変数に代入
        $search = $request->search;

        if ($members->isEmpty()) {
            $msg = '該当するメンバーは登録されていません';
        } else {
            $msg = '検索結果';
        }

        return view('members.index', ['members' => $members, 'search' => $search, 'msg' => $msg]);
    }
}
