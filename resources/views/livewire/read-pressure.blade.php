<div class="px-6 py-4">
    <form wire:submit.prevent="create">
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Systolic Pressure
        </label>
        <input wire:model="systolicPressure" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('systolicPressure') border-red-500 @enderror" type="number">
        @error('systolicPressure')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
        </div>
        <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Diastolic Pressure
        </label>
        <input wire:model="diastolicPressure" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('diastolicPressure') border-red-500 @enderror" type="number" />
        @error('diastolicPressure')<p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
        </button>
        </div>
    </form>
</div>
