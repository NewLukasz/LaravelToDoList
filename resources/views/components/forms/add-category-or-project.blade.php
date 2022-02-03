<form action="{{url('/categories/store')}}" method="POST">
    @csrf
    <div class="flex justify-center">
        <div class="grid grid-cols-5 gap-5">
            <div class="col-span-4">
                <x-input class="w-full" type="text" name='newCategoryName'/>
            </div>
            <div class="col-span-1">
                <x-button class="h-full"> Add new category</x-button>
            </div>
        </div>
    </div>
</form>
