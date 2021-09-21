<div>
    <div class="min-h-screen h-screen -mt-16">
        <div class="w-full h-full flex flex-col items-center justify-center">
            <div class="text-2xl font-black">
                {{__("Oops! This orientation is not ready yet.")}}
            </div>
            <div class="">
                {{__("Please check back in a couple of hours or contact support")}}: <a href="mailto:{{config('app.support_email')}}" class="text-blue-500">{{config('app.support_email')}}</a>
            </div>
        </div>
    </div>
</div>
