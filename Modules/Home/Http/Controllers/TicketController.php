<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Ticket\Ticket;
use Modules\Admin\Entities\Ticket\TicketCategory;
use Modules\Home\Http\Requests\TicketRequest;

class TicketController extends Controller
{

    public function tickets()
    {
        $tickets = Ticket::query()->where('user_id' , auth()->id())->latest()->get();
        return view('home::customer.profile-ticket' , compact('tickets'));
    }

    public function create()
    {
        $ticketCategories = TicketCategory::query()->where('status' , 1)->get();
        return view('home::customer.ticket-create' , compact('ticketCategories'));
    }

    public function store(TicketRequest $request)
    {
        $inputs = [
            'user_id' => auth()->id() ,
          'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ];
        Ticket::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('user.profile.tickets');
    }

    public function edit(Ticket $ticket)
    {
        $ticketCategories = TicketCategory::query()->where('status' , 1)->get();
        return view('home::customer.ticket-edit' , compact('ticketCategories' , 'ticket'));
    }

    public function update(TicketRequest $request , Ticket $ticket)
    {
        $inputs = [
            'user_id' => auth()->id() ,
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ];
        $ticket->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('user.profile.tickets');
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('user.profile.tickets');
    }

    public function show(Ticket $ticket)
    {
        return view('home::customer.show-ticket' , compact('ticket'));
    }

}
