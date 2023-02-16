<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form default="{ plan: 'basic' }">
                        <div class="flex flex-row justify-center space-x-4">
                            <x-card-label plan="basic" title="Plan Basic" price="9.99" />
                            <x-card-label plan="pro" title="Plan Pro" price="19.99" />
                        </div>
                    </x-splade-form>
                    <x-splade-form default="{ amount: 1 }">
                        <x-splade-defer
                            url="/product/reservation"
                            method="post"
                            request="{ product: 'book', amount: form.amount }"
                            watch-value="form.amount"
                        >
                            <input v-model="form.amount" type="number" />
                            <p v-text="response" />
                        </x-splade-defer>
                    </x-splade-form>


                    <x-splade-form  stay @success="$splade.emit('checkout')">
                        <x-splade-input name="name" />

                    </x-splade-form>
{{--                    <x-splade-rehydrate on="checkout">--}}
{{--                        <ul>--}}
{{--                            @foreach(['Maksat','Chopa','Kutkeldi','Ibrahim'] as $member)--}}
{{--                                <li>{{ $member }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </x-splade-rehydrate>--}}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

