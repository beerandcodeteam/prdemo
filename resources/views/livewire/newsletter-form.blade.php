<div>

    @if (session()->has('message'))
        <div class="p-5 text-center">
            <div class="p-5 rounded-lg border border-green-400 bg-green-300 text-green-900">
                <p class="pt-2">{{ session('message') }}</p>
            </div>
        </div>
    @endif

    <div class="mx-80 mt-5 p-5 rounded-lg border border-red-400 bg-red-1 text-green-900">
        <h2 class="font-bold text-xl pb-2 mb-5">🍻 Beer and code - Newsletter [DEMO]!</h2>
        <form wire:submit.prevent="submit">
            <div class="mb-4 box-border">
                <input type="text" class="outline-none block overflow-visible py-1 px-3 m-0 w-full h-12 text-base font-normal leading-normal text-black bg-clip-padding bg-repeat rounded-sm border border-gray-300 border-solid shadow-none cursor-text box-border focus:bg-white focus:border-yellow-300 focus:shadow-xs focus:text-gray-700"  id="name" placeholder="Nome" wire:model="name">
                @error('name')<span class="text-red-900">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4 box-border">
                <input type="text" class="outline-none block overflow-visible py-1 px-3 m-0 w-full h-12 text-base font-normal leading-normal text-black bg-clip-padding bg-repeat rounded-sm border border-gray-300 border-solid shadow-none cursor-text box-border focus:bg-white focus:border-yellow-300 focus:shadow-xs focus:text-gray-700" id="email" placeholder="E-mail" wire:model="email">
                @error('email')<span class="text-red-900">{{ $message }}</span>@enderror
    
            </div>
            <button type="submit" class="inline-block overflow-visible relative py-3 px-4 mx-0 mt-0 mb-5 text-sm font-normal leading-normal text-center text-white align-middle whitespace-pre bg-red-500 bg-none rounded border border-red-500 border-solid cursor-pointer select-none box-border shadow-xs hover:bg-red-800 hover:border-red-500 hover:shadow-xs hover:text-white hover:no-underline focus:bg-red-500 focus:border-red-500 focus:shadow-xs"
            style="transition: all 0.3s ease 0s; background-position: 0% center;">Enviar</button>
        </form>
        
        <p><a href="{{ url('/list') }}" target="_blank" class="text-xs">Inscritos</a></p>

        <div class="mx-100 mt-5 p-5 rounded-lg border border-red-400 bg-red-1 text-green-900">
            📺  Inspirado na talk do <span class=" text-red-800 font-semibold">Tio Jobs</span> no <a 
            class=" left-0 w-full h-1 leading-9 text-left bg-red-200 rounded-sm cursor-pointer" target="_blank" href="https://www.youtube.com/watch?v=q_8kRlAIyms">Pest Meet Up #1</a>?  Googla ai!
         </div>
     </div>
</div>