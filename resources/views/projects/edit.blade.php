@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student</label>
                    <select class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id', $project->student_id) == $student->id ? 'selected' : '' }}>{{ $student->fullname }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="topic_id" class="form-label">Topic</label>
                    <select class="form-control @error('topic_id') is-invalid @enderror" id="topic_id" name="topic_id">
                        <option value="">Select Topic</option>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" {{ old('topic_id', $project->topic_id) == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                        @endforeach
                    </select>
                    @error('topic_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <hr>

        <h3>Financial Details</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="project_cost" class="form-label">Total Project Fee</label>
                    <input type="number" step="0.01" class="form-control @error('project_cost') is-invalid @enderror" id="project_cost" name="project_cost" value="{{ old('project_cost', $project->project_cost) }}">
                    @error('project_cost')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="amount_paid" class="form-label">Amount Paid by Student</label>
                    <input type="number" step="0.01" class="form-control @error('amount_paid') is-invalid @enderror" id="amount_paid" name="amount_paid" value="{{ old('amount_paid', $project->amount_paid) }}">
                    @error('amount_paid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="balance" class="form-label">Project Fee Balance</label>
                    <input type="number" step="0.01" class="form-control" id="balance" name="balance" value="{{ old('balance', $project->balance) }}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="supervisor_fee" class="form-label">Supervisor Fee</label>
                    <input type="number" step="0.01" class="form-control @error('supervisor_fee') is-invalid @enderror" id="supervisor_fee" name="supervisor_fee" value="{{ old('supervisor_fee', $project->supervisor_fee) }}">
                    @error('supervisor_fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
             <div class="col-md-6">
                <div class="mb-3">
                    <label for="amt_paid_to_supervisor" class="form-label">Amount Paid to Supervisor</label>
                    <input type="number" step="0.01" class="form-control @error('amt_paid_to_supervisor') is-invalid @enderror" id="amt_paid_to_supervisor" name="amt_paid_to_supervisor" value="{{ old('amt_paid_to_supervisor', $project->amt_paid_to_supervisor) }}">
                    @error('amt_paid_to_supervisor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="supervisor_balance" class="form-label">Supervisor Balance</label>
                    <input type="number" step="0.01" class="form-control" id="supervisor_balance" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="developer_fee" class="form-label">Developer Fee</label>
                    <input type="number" step="0.01" class="form-control @error('developer_fee') is-invalid @enderror" id="developer_fee" name="developer_fee" value="{{ old('developer_fee', $project->developer_fee) }}" readonly>
                    @error('developer_fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="amt_paid_to_developer" class="form-label">Amount Paid to Developer</label>
                    <input type="number" step="0.01" class="form-control @error('amt_paid_to_developer') is-invalid @enderror" id="amt_paid_to_developer" name="amt_paid_to_developer" value="{{ old('amt_paid_to_developer', $project->amt_paid_to_developer) }}">
                    @error('amt_paid_to_developer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="developer_balance" class="form-label">Developer Balance</label>
                    <input type="number" step="0.01" class="form-control" id="developer_balance" readonly>
                </div>
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <label for="project_status" class="form-label">Project Status</label>
            <select class="form-control @error('project_status') is-invalid @enderror" id="project_status" name="project_status">
                <option value="pending" {{ old('project_status', $project->project_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ old('project_status', $project->project_status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('project_status', $project->project_status) == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('project_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const projectCostInput = document.getElementById('project_cost');
        const amountPaidInput = document.getElementById('amount_paid');
        const balanceInput = document.getElementById('balance');

        const supervisorFeeInput = document.getElementById('supervisor_fee');
        const amtPaidToSupervisorInput = document.getElementById('amt_paid_to_supervisor');
        const supervisorBalanceInput = document.getElementById('supervisor_balance');

        const developerFeeInput = document.getElementById('developer_fee');
        const amtPaidToDeveloperInput = document.getElementById('amt_paid_to_developer');
        const developerBalanceInput = document.getElementById('developer_balance');

        function calculateAndSetValues() {
            const projectCost = parseFloat(projectCostInput.value) || 0;
            const amountPaid = parseFloat(amountPaidInput.value) || 0;

            const supervisorFee = parseFloat(supervisorFeeInput.value) || 0;
            const amtPaidToSupervisor = parseFloat(amtPaidToSupervisorInput.value) || 0;

            const developerFee = projectCost - supervisorFee;
            const amtPaidToDeveloper = parseFloat(amtPaidToDeveloperInput.value) || 0;

            balanceInput.value = (projectCost - amountPaid).toFixed(2);
            developerFeeInput.value = developerFee.toFixed(2);
            supervisorBalanceInput.value = (supervisorFee - amtPaidToSupervisor).toFixed(2);
            developerBalanceInput.value = (developerFee - amtPaidToDeveloper).toFixed(2);
        }

        projectCostInput.addEventListener('input', calculateAndSetValues);
        amountPaidInput.addEventListener('input', calculateAndSetValues);
        supervisorFeeInput.addEventListener('input', calculateAndSetValues);
        amtPaidToSupervisorInput.addEventListener('input', calculateAndSetValues);
        amtPaidToDeveloperInput.addEventListener('input', calculateAndSetValues);

        // Initial calculation on page load
        calculateAndSetValues();
    });
</script>
@endpush
