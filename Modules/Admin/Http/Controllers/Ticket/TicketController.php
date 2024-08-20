<?php

namespace Modules\Admin\Http\Controllers\Ticket;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Ticket\Ticket;
use Modules\Admin\Entities\Ticket\TicketCategory;
use Modules\Admin\Http\Requests\Ticket\TicketRequest;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $title = 'تمام تیکت ها';
        $unSeenTickets = Ticket::query()->where('seen' , 0)->get();
        foreach ($unSeenTickets as $unSeenTicket){
            $unSeenTicket->seen = 0;
            $unSeenTicket->save();
        }
        if($request->get('category'))
        {
            $id = $request->get('category');
            $query = Ticket::query()->where('category_id' ,  $id);
        }else{
            $query = Ticket::query();
        }
        $ticketCategories = TicketCategory::query()->where('status' , 1)->get();
        $tickets = $query->paginate(8);
        return view('admin::ticket.ticket.index', compact('tickets' , 'title' , 'ticketCategories'));
    }

    public function answered(Request $request)
    {
        $title = 'تیکت های پاسخ داده شده';
        $unSeenTickets = Ticket::query()->where('seen' , 0)->get();
        foreach ($unSeenTickets as $unSeenTicket){
            if($unSeenTicket->answers->count() !== 0 && $unSeenTicket->ticket_id == null ) {
                $unSeenTicket->seen = 0;
                $unSeenTicket->save();
            }
        }
        $ticketAs = Ticket::query()->get();
        $tickets = [];
        foreach ($ticketAs as $ticketA) {
            if($ticketA->answers->count() !== 0 && $ticketA->ticket_id == null ) {
                if($request->get('category'))
                {
                    $id = $request->get('category');
                    $query = Ticket::query()->orderBy('created_at', 'desc')->where('id', $ticketA->id)->where('category_id' ,  $id);
                }else{
                    $query = Ticket::query()->orderBy('created_at', 'desc')->where('id', $ticketA->id);
                }
                $tickets = $query->paginate(8);
            }
        }
        $ticketCategories = TicketCategory::query()->where('status' , 1)->get();
        return view('admin::ticket.ticket.index', compact('tickets' , 'title' , 'ticketCategories'));
    }

    public function notAnswer(Request $request)
    {
        $title = 'تیکت های پاسخ داده نشده';
        $unSeenTickets = Ticket::query()->where('seen' , 0)->get();
        foreach ($unSeenTickets as $unSeenTicket) {
            if ($unSeenTicket->answers->count() == 0 && $unSeenTicket->ticket_id == null) {
                $unSeenTicket->seen = 0;
                $unSeenTicket->save();
            }
        }
        $ticketAs = Ticket::query()->get();
        $tickets = [];
        foreach ($ticketAs as $ticketA) {
            if($ticketA->answers->count() == 0 && $ticketA->ticket_id == null ) {

                if($request->get('category'))
                {
                    $id = $request->get('category');
                    $query = Ticket::query()->orderBy('created_at', 'desc')->where('id', $ticketA->id)->where('category_id' ,  $id);
                }else{
                    $query = Ticket::query()->orderBy('created_at', 'desc')->where('id', $ticketA->id);
                }
                $tickets = $query->paginate(8);

            }
        }
        $ticketCategories = TicketCategory::query()->where('status' , 1)->get();
        return view('admin::ticket.ticket.index', compact('tickets' , 'title' , 'ticketCategories'));
    }

    public function answers(Ticket $ticket)
    {
        $tickets = Ticket::query()->where('ticket_id' , $ticket->id)->get();
        return view('admin::ticket.ticket.answers', compact('ticket' , 'tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('admin::ticket.ticket.show' , compact('ticket'));
    }

    public function answer(TicketRequest $request , Ticket $ticket)
    {
        if($ticket->ticket_id == null)
        {
            $ticket->seen = 1;
            $ticket->status = 1;
            $ticket->save();
         Ticket::query()->create([
           'title' => 'پاسخ',
           'body' => $request->body,
           'status' => 1,
           'seen' => 1,
             'user_id' => auth()->id(),
             'ticket_id' => $ticket->id,
             'category_id' => $ticket->category_id,
         ]);
            alert()->success('عملیات با موفقیت انجام شد');
            return to_route('admin.ticket.index');
        }else{
            alert()->success('خطا');
            return to_route('admin.ticket.index');
        }
    }

    public function destroy(Ticket $ticket)
    {
        $result = $ticket->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.index');
    }


    public function status(Ticket $ticket){

        $ticket->status = $ticket->status == 0 ? 1 : 0;
        $ticket->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.index');
    }

}
