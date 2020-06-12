<?php

namespace App\Http\Livewire;
use App\Customer;

use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'id';
    public $sorAsc = false;
    public $search = '';
    public $customer;
    public $confirming;


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }


    public function deleteCustomer($id)
    {
        $patients = Customer::findOrFail($id);
        //$patients->packages()->where('customer_id','=',$id)->detach();
        $result = $patients->delete();
        if(!$result)
        {
            return redirect()->route('patients.index')->with('danger','Error Deleting Data');
        }
        $this->render();
        //dd($id);
    }

    public function render()
    {
        return view('livewire.customer-list',[
            'customers' => Customer::search($this->search)
                        ->orderBy($this->sortField,$this->sorAsc ? 'asc':'desc')
                        ->paginate($this->perPage)
        ]);
    }
}
