@if($type=="categories")
<form action="{{url('/categories/store')}}" method="POST">
@elseif($type=="projects")
<form action="{{url('/projects/store')}}" method="POST">
@endif
    @csrf
    <div class="flex justify-center">
        <div class="grid grid-cols-5 gap-5">
            <div class="col-span-4">
                @if($type=="categories")
                    <x-input class="w-full" type="text" name='newName' placeholder="Type here new category name if required"/>
                @elseif($type=="projects")
                    <x-input class="w-full" type="text" name='newName' placeholder="Type here new project name if required"/>
                @endif
            </div>
            <div class="col-span-1">
                @if($type=="categories")
                    <x-button-blue class="h-full">Add new category</x-button-blue>
                @elseif($type=="projects")
                    <x-button-blue class="h-full">Add new project</x-button-blue>
                @endif
            </div>
        </div>
    </div>
</form>
