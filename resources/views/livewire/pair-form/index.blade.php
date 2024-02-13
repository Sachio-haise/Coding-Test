<div class="min-w-[24rem] h-[30rem]">
    <p class="font-bold text-white text-xl">Pair <span class="text-cyan-400">Elements</span></p>
    <div class="bg-secondary rounded-lg p-4">
        <div class="my-2">
            <label for="elements" class="text-white flex items-center">Elements
                @foreach ($elements as $item)
                <p class="text-white relative p-[2px] text-sm bg-cyan-400 rounded-md h-fit w-fit mx-1">{{ $item }}
                    <span wire:click="removeElement('{{ $item }}')" class="absolute hover:cursor-pointer -top-[7px] right-[-2px] bg-gray-200 p-[2px] rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#22D3EE" class="h-2 w-2" viewBox="0 0 16 16">
                            <path d="M9.415 8l5.292-5.292a1 1 0 0 0-1.414-1.414L8 6.586 2.708 1.294a1 1 0 0 0-1.414 1.414L6.586 8l-5.292 5.292a1 1 0 0 0 1.414 1.414L8 9.414l5.292 5.292a1 1 0 0 0 1.414-1.414L9.414 8l5.292-5.292a1 1 0 0 0-1.414-1.414L8 6.586 2.708 1.294a1 1 0 0 0-1.414 1.414L6.586 8l-5.292 5.292a1 1 0 0 0 1.414 1.414L8 9.414l5.292 5.292a1 1 0 0 0 1.414-1.414z" />
                        </svg>
                    </span>
                </p>
                @endforeach
            </label>
            <input type="number" id="elements" class="border-[3px] border-gray-400 mb-1 focus:outline-none focus:border-cyan-400 rounded-md p-2 mt-1 w-full" placeholder="Enter elements" wire:model.live.debounce.500ms="element" value="{{$element}}" wire:keydown.space="updateElements" />
            <span class="text-[10px] p-2 text-white">Enter <span class="text-cyan-400 font-bold">SPACE</span> To Add Value</span>
        </div>
        <div class="my-2">
            <label for="elements" class="text-white flex items-center">Target Number</label>
            <input type="number" id="elements" class="border-[3px] border-gray-400 focus:outline-none focus:border-cyan-400 rounded-md p-2 mt-1 w-full" placeholder="Enter elements" wire:model.live.debounc.500ms="target_element" value="{{$target_element}}" />
        </div>
        <button class="border-[3px] border-gray-400 focus:outline-none hover:bg-cyan-400 transition-all duration-200 hover:border-cyan-400 rounded-md p-2 mt-1 w-full text-white" wire:click="calculateResult">Calculate</button>
    </div>

    @if ($result && count($elements) >= 2)
    <p class="mt-6 font-bold text-white text-xl">The <span class="text-cyan-400">Result</span></p>
    <div class="bg-secondary rounded-lg p-4">
        <p class="text-white text-sm">The combination of addition of two elements is : </p>
        <p class="font-bold text-cyan-400 text-center bg-gray-100 px-2 w-fit mx-auto rounded-3xl text-lg mt-2">{{ $result }}</p>
        <p class="text-white text-sm my-1">explanation : </p>
        @foreach ($result_ary as $item)
        <span class="text-cyan-400 font-bold">{{ $item }}</span>
        @if (!$loop->last)
        <span class="text-white">,&nbsp;</span>
        @endif
        @endforeach
    </div>
    @endif

    @if ($result === 0)
    <p class="mt-6 font-bold text-white text-xl">The <span class="text-cyan-400">Result</span></p>
    <div class="bg-secondary rounded-lg p-4">
        <p class="text-white text-sm py-2">Oops! There are no combinations of two elements that <br />sum up to the target value.</p>
    </div>
    @endif

    @if (count($elements) < 2) <p class="mt-6 font-bold text-white text-xl">The <span class="text-cyan-400">Result</span></p>
        <div class="bg-secondary rounded-lg p-4">
            <p class="text-white text-sm py-2">Please add at least two elements</p>
        </div>
        @endif
</div>
