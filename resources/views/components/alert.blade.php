<!-- The button to open modal -->
<label for="my-modal-3" class="btn" id="clickButton" style="display: none">open modal</label>
<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />

<div class="modal">
    <div class="modal-box relative h-fit pr-14 px-8 backdrop-blur-sm {{ $content }}">
        <label for="my-modal-3" id="closeButton"
            class="btn btn-sm h-full w-10 rounded-none absolute right-0 top-0 border-none {{ $close }} ">✕</label>
        <div class="flex gap-4 font-light text-xl items-center">
            <div class="border-2 p-1.5 border-white rounded-full">
                <i data-feather="{{ $icon }}" class="text-white w-5 h-5" style="stroke-width: 2"></i>
            </div>
            {{ $message }}
        </div>
    </div>
</div>
