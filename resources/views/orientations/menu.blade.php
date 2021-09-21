<div class="flex items-center gap-4">
    <a href="{{route('orientation.show', ['orientation' => $orientation->id])}}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 @if(Route::currentRouteName() == 'orientation.show') text-indigo-600 dark:text-indigo-400 @else text-gray-600 dark:text-gray-200 @endif">
        <span>{{__("Sections")}}</span>
    </a>

    <a href="{{route('orientation.participants', ['orientation' => $orientation->id])}}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 @if(Route::currentRouteName() == 'orientation.participants') text-indigo-600 dark:text-indigo-400 @else text-gray-600 dark:text-gray-200 @endif">
        <span>{{__("Participants")}}</span>
    </a>

    <a href="{{route('orientation.stats', ['orientation' => $orientation->id])}}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 @if(Route::currentRouteName() == 'orientation.stats') text-indigo-600 dark:text-indigo-400 @else text-gray-600 dark:text-gray-200 @endif">
        <span>{{__("Statistics")}}</span>
    </a>

    <a href="{{route('orientation.settings', ['orientation' => $orientation->id])}}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 @if(Route::currentRouteName() == 'orientation.settings') text-indigo-600 dark:text-indigo-400 @else text-gray-600 dark:text-gray-200 @endif">
        <span>{{__("Settings")}}</span>
    </a>
</div>
