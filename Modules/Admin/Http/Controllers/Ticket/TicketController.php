<?php

namespace Modules\Admin\Http\Controllers\Ticket;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TicketController extends Controller
{

    public function index()
    {
        $ticketCategories = TicketCategory::query()->paginate(8);
        return view('admin::ticket.ticket-category.index', compact('ticketCategories'));
    }


    public function create()
    {
        return view('admin::ticket.ticket-category.create');
    }


    public function store(TicketCategoryRequest $request)
    {
        $inputs = $request->all();
        $ticketCategory = TicketCategory::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.category.index');
    }


    public function edit(TicketCategory $ticketCategory)
    {
        return view('admin::ticket.ticket-category.edit', compact('ticketCategory'));
    }


    public function update(TicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        $inputs = $request->all();
        $ticketCategory->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.category.index');
    }


    public function destroy(TicketCategory $ticketCategory)
    {
        $result = $ticketCategory->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.category.index');    }


    public function status(TicketCategory $ticketCategory){

        $ticketCategory->status = $ticketCategory->status == 0 ? 1 : 0;
        $ticketCategory->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.ticket.category.index');
    }

}
