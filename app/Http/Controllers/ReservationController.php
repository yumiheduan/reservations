<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Member;
use App\Room;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!($request->session()->get('id') == null)) {
            $request->member_id = $request->session()->get('id');
        }
        $member = Member::find($request->member_id);
        $reservations = Reservation::where('member_id', $request->member_id)->get();
        return view('reservations.index', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Reservation $reservations)
    {
        $member = Member::find($request->member_id);
        return view('reservations.create', ['member' => $member, 'reservations' => $reservations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->member_id = $request->member_id;
        $reservation->save();

        return redirect()->route('reservations.show', $reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $member = Member::find($reservation->member_id);
        $room = Room::where('id', $reservation->room_id)->first();
        return view('reservations.show', ['member' => $member, 'reservation' => $reservation, 'room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $member = Member::find($reservation->member_id);
        $room = Room::where('id', $reservation->room_id)->first();
        return view('reservations.edit', ['member' => $member, 'reservation' => $reservation, 'room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->fill($request->all())->save();
        return redirect()->route('reservations.show', $reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Request $request)
    {
        $reservation->delete();
        $request->member_id = $reservation->member_id;
        return redirect()->route('reservations.index')->with(['id' => $request->member_id]);
    }
}
