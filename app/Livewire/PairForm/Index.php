<?php

namespace App\Livewire\PairForm;

use Livewire\Component;

class Index extends Component
{
    public $element;
    public $elements = [];
    public $target_element;
    public $result_ary = [];
    public $result;

    public function updateElements(){
        if(!$this->element){
            return;
        }
        $this->elements[] = $this->element;
        $this->element = "";
    }

    public function removeElement($element){
        $this->resetResult();
        $key = array_search($element, $this->elements);
        if ($key !== false) {
            array_splice($this->elements, $key, 1);
        }
    }

    public function calculateResult(){
        if(count($this->elements) < 2){
            return;
        }
        $this->resetResult();
        $pairCount = 0;
        for ($i = 0; $i < count($this->elements); $i++) {
            for ($j = $i + 1; $j < count($this->elements); $j++) {
                if ($this->elements[$i] + $this->elements[$j] == $this->target_element) {
                    $this->result_ary[] = $this->elements[$i] . " + " . $this->elements[$j];
                    $pairCount++;
                }
            }
        }
        $this->result = $pairCount;
    }

    private function resetResult(){
        $this->result_ary = [];
        $this->result = null;
    }

    public function render()
    {
        return view('livewire.pair-form.index');
    }
}
