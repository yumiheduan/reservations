<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Requests\SearchRequest;
use App\Member;

class MemberController extends Controller
{
    /**
     * 会員のリストを表示する（検索結果）
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.index');
    }

    /**
     * 新しい会員情報を作成するためのフォームを表示する
     *
     * @param Member $member
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {
        return view('members.create', ['member' => $member]);
    }

    /**
     * 新しく作成した会員情報を保存する
     *
     * @param  \Illuminate\Http\MemberRequest  $request
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
     * 指定した会員の詳細情報を表示する
     *
     * @param App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', ['member' => $member]);
    }

    /**
     * 会員の情報を編集するためのフォームを表示する
     *
     * @param App\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', ['member' => $member]);
    }

    /**
     * 指定した会員の情報を変更する
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
     * 指定した会員を削除する（物理的削除）
     *
     * @param  \app\member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }

    /**
     * 会員を検索条件で抽出して取得する
     *
     * @param SearchRequest $request
     * @return void
     */
    public function search(SearchRequest $request)
    {
        $members = Member::where("kana_name", "like", $request->search. "%")->paginate(5);

        // ペジネーションリンク追加のために変数に代入する
        $search = $request->search;

        return view('members.index', ['members' => $members, 'search' => $search]);
    }
}
