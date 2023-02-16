
<x-splade-script>

    var objDiv = document.getElementById("scroller");
    objDiv.scrollTop = objDiv.scrollHeight;

{{--    console.log('Maksat');--}}

    window.Echo.private('user-1')
    .listen('ApplicationChat',(e) => {
    // this.appendToModalChat(e.data);
    console.log(e)
    })

    ;

</x-splade-script>
{{--<p v-text="asdfasdfasdfas" />--}}

{{--<x-splade-event  channel="chat" listen="message" >--}}

{{--    <p v-text="events.data" />--}}
{{--</x-splade-event>--}}
{{--<x-splade-event  private channel="user-1" listen="ApplicationChat" >--}}
{{--mkmk--}}
{{--    <p v-text="events.data" />--}}
{{--</x-splade-event>--}}


<div class="flex-1 overflow-auto" id="scroller" style="background-color: #DAD3CC">
    <div class="py-2 px-3">

        <div class="flex justify-center mb-2">
            <div class="rounded py-2 px-4" style="background-color: #DDECF2">
                <p class="text-sm uppercase">
                    February 20, 2018
                </p>
            </div>
        </div>

        <div class="flex justify-center mb-4">
            <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                <p class="text-xs">
                    Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
                </p>
            </div>
        </div>
{{--        @dump("user-".$customer->id)--}}
        <x-splade-event private channel="user-{{ $customer->id }}" listen="ApplicationChat" >
            wwwww
{{--            <p v-if="events.number">Subscribed!</p>--}}

        @foreach($messages as $message)
            @if($message->data['self']=='1')
                <div class="flex mb-2">
                    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
                        <p class="text-sm text-teal">
                            {{ $message->notifiable->fullname }}
                        </p>
                        <p class="text-sm mt-1">
                                {{ $message->data['message'] }}
                        </p>
                        <p class="text-right text-xs text-grey-dark mt-1">
                            12:45 pm
                        </p>
                    </div>
                </div>
            @endif
                @if($message->data['self']=='0')
                    <div class="flex justify-end mb-2">
                        <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                            <p class="text-sm mt-1">
                                {{ $message->data['message'] }}
                            </p>
                            <p class="text-right text-xs text-grey-dark mt-1">
                                12:45 pm
                            </p>
                        </div>
                    </div>
                @endif
        @endforeach

        </x-splade-event>
        <x-splade-event private channel="chat-{{ $customer->id }}" listen="NewMessages" >
            <x-splade-data default="{ name: 'Laravel Splade' }">

                <p v-text="events[events.length-1]" />
                {{--            <div v-for="event in events">--}}
                {{--                <p v-text="event.name" />--}}
                {{--                <p v-text="event.data.number" />--}}
                {{--            </div>--}}
            </x-splade-data>
        </x-splade-event>
    </div>
</div>
