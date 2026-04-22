@forelse ($messages as $msg)
<div class="flex {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }} mb-3 gap-2 items-end">

    {{-- Avatar penerima (kiri) --}}
    @if($msg->sender_id != auth()->id())
        @if($msg->sender->avatar)
            <img src="{{ asset('storage/' . $msg->sender->avatar) }}"
                class="w-7 h-7 rounded-full object-cover flex-shrink-0 mb-0.5 border border-gray-100">
        @else
            <div class="w-7 h-7 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold flex-shrink-0 mb-0.5">
                {{ strtoupper(substr($msg->sender->name, 0, 1)) }}
            </div>
        @endif
    @endif

    <div class="max-w-xs md:max-w-sm">
        @if($msg->images->count() > 0)
            <div class="{{ $msg->sender_id == auth()->id() ? 'flex justify-end flex-wrap gap-2' : 'flex flex-wrap gap-2' }}">
                @foreach($msg->images as $chatImage)
                    <a href="{{ asset('storage/' . $chatImage->image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $chatImage->image_path) }}"
                            class="rounded-2xl max-w-[220px] max-h-64 object-cover cursor-pointer hover:opacity-90 transition border border-gray-100 shadow-sm
                            {{ $msg->sender_id == auth()->id() ? 'rounded-br-sm' : 'rounded-bl-sm' }}">
                    </a>
                @endforeach
            </div>
        @elseif($msg->image)
            <div class="{{ $msg->sender_id == auth()->id() ? 'flex justify-end' : '' }}">
                <a href="{{ asset('storage/' . $msg->image) }}" target="_blank">
                    <img src="{{ asset('storage/' . $msg->image) }}"
                        class="rounded-2xl max-w-[220px] max-h-64 object-cover cursor-pointer hover:opacity-90 transition border border-gray-100 shadow-sm
                        {{ $msg->sender_id == auth()->id() ? 'rounded-br-sm' : 'rounded-bl-sm' }}">
                </a>
            </div>
        @endif

        @if($msg->message)
            <div class="px-4 py-2.5 rounded-2xl text-sm leading-relaxed mt-1
                {{ $msg->sender_id == auth()->id()
                    ? 'bg-blue-600 text-white rounded-br-sm'
                    : 'bg-white text-gray-800 shadow-sm border border-gray-100 rounded-bl-sm' }}">
                {{ $msg->message }}
            </div>
        @endif

        <p class="text-[10px] text-gray-400 mt-1 px-1
            {{ $msg->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
            {{ $msg->created_at->format('H:i') }}
            @if($msg->sender_id == auth()->id())
                {{ $msg->read_at ? '✓✓' : '✓' }}
            @endif
        </p>
    </div>

    {{-- Avatar sendiri (kanan) --}}
    @if($msg->sender_id == auth()->id())
        @if(auth()->user()->avatar)
            <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                class="w-7 h-7 rounded-full object-cover flex-shrink-0 mb-0.5 border-2 border-blue-200">
        @else
            <div class="w-7 h-7 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold flex-shrink-0 mb-0.5">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        @endif
    @endif

</div>
@empty
<div class="flex items-center justify-center h-full py-10">
    <div class="text-center text-gray-400">
        <div class="text-4xl mb-2">👋</div>
        <p class="text-sm">Mulai percakapan!</p>
    </div>
</div>
@endforelse
