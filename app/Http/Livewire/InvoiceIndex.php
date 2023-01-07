<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use livewire\WithPagination;

class InvoiceIndex extends Component
{
    public function render()
    {$invoices = Invoice::Paginate(50);
        return view('livewire.invoice-index', [
            'invoices' => $invoices
        ]);
    }
}
