@props(['active', 'as' => 'Link'])

@php
    $classes = ($active ?? false)
                ? 'bg-slate-100'
                : 'bg-slate-500';
@endphp



<div>
    <div class="w-full h-32" style="background-color: #449388"></div>

    <div class="container mx-auto" style="margin-top: -128px;">
        <div class="py-6 h-screen">
            <div class="flex border border-grey rounded shadow-lg h-full">

                <!-- Left -->
                <x-left :customers="$customers" />


                <!-- Right -->
               {{ $slot }}

            </div>
        </div>
    </div>
</div>
