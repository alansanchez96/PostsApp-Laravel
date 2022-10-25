@if (session('status'))
    <div class='flex flex-row bg-gray-800 h-10 w-[400px] rounded-[30px] mx-auto my-5'>
        <span class='flex flex-col justify-center text-green-500 font-bold grow-[1] max-w-[100%] text-center'>
            {{ session('status') }}
        </span>
    </div>
@endif
