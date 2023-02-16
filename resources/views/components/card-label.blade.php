
<label class="w-64 cursor-pointer rounded-md shadow-sm bg-white border-2 py-8 px-4" :class="{ 'border-white': form.plan !== @js($plan), 'border-green-500': form.plan === @js($plan) }">
    <input type="radio" class="sr-only" :value="@js($plan)" v-model="form.plan" />

    <div class="flex flex-row justify-between items-center">
        <span class="font-bold">{{ $title }}</span>

        <svg v-show="form.plan === @js($plan)" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>

    <span class="text-sm">$ {{ $price }} / month</span>
</label>
