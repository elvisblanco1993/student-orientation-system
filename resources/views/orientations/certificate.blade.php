<x-guest-layout>
<div class="max-w-5xl mx-auto my-6">
    <div class="border-8 border-blue-800 px-48 py-24 text-center">
        <div class="uppercase font-black text-4xl">
            Certificate Of Completion
        </div>
        <div class="uppercase mt-20 text-2xl">
            Is hereby granted to
        </div>
        <div class="uppercase mt-6 text-6xl text-black font-black">
            {{$name}}
        </div>
        <div class="uppercase mt-6 text-xl">
            To certify completion of {{$orientation}}
        </div>

        <div class="mt-20">
            <div class="flex items-end justify-between gap-12">
                <div class="w-1/2">
                    <div class="">

                    </div>
                    <div class="border-b border-black w-full"></div>
                    <div class="">
                        Verified by
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="">
                        {{date('M d, Y', strtotime($completed))}}
                    </div>
                    <div class="border-b border-black w-full"></div>
                    <div class="">
                        Date
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center" id="noprint">
    <div class="bg-red-50 inline-block px-4 py-2 border border-red-400">
        You can print this certificate by pressing <span class="text-xs border border-gray-400 rounded bg-gray-200 px-1 shadow">ctrl</span> + p
    </div>
</div>
<style>
    @media print {
    #noprint {
        display: none;
    }
}
</style>
</x-guest-layout>
