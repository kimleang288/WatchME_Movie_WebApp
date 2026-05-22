@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-[#ffffff0f] border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
