<div>
    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input wire:model.lazy="search" type="text" class="lms-input" placeholder="search" required>
        <div class="ml-4"><button type="submit" class="lms-btn">Search</button></div>
    </form>

    @if (count($leads) > 0)
    <form wire:submit.prevent="admit">
        <div class="mb-4">
            <select wire:model.lazy="lead_id" class="lms-input" >
                <option value="">Select Lead</option>
                @foreach ($leads as $lead)
                    <option value="{{ $lead->id }}">{{ $lead->name }} - {{ $lead->email }} - {{ $lead->phone }}</option>
                @endforeach
            </select>
        </div>

    @if (!empty($lead_id))
    <div class="mb-4">
        <select wire:change="courseSelected" wire:model.lazy="course_id" class="lms-input">
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    @if (!empty($selectedCourse))
    <p class="mb-4">Price: ${{ number_format($selectedCourse->price , 1) }}</p>
    <div class="mb-4">
        <input wire:model.lazy="payment" step=".01" type="number" class="lms-input" placeholder="payment now">
    </div>
    @include('components.wire-loading-btn')
    @endif
    </form>


    @endif


</div>
