@extends('layouts.admin')

@section('title', 'Event Planner - Registrations')

@section('content')
    <div class="main-content">
        <h1 class="page-title">List of registrations</h1>

        <div class="registrations-card">
            <div class="registrations-header">
                <h2 class="registrations-title">Registrations</h2>
            </div>

            <table class="registrations-table">
                <thead>
                    <tr>
                        <th>Event title</th>
                        <th>Start date</th>
                        <th>User's email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $registration)
                        <tr>
                            <td>{{ $registration->event->title ?? 'N/A' }}</td>
                            <td>{{ $registration->event ? \Carbon\Carbon::parse($registration->event->start_date)->format('M j, Y, g:ia') : 'N/A' }}</td>
                            <td>{{ $registration->user->email ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="no-data">No registrations found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .main-content {
            padding: 40px 40px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #7c3aed;
            margin-bottom: 40px;
        }

        .registrations-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .registrations-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e0e0e0;
        }

        .registrations-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .registrations-table {
            width: 100%;
            border-collapse: collapse;
        }

        .registrations-table thead {
            background: #fafafa;
        }

        .registrations-table th {
            padding: 16px 28px;
            text-align: left;
            font-size: 13px;
            font-weight: 500;
            color: #666;
        }

        .registrations-table td {
            padding: 20px 28px;
            border-top: 1px solid #f0f0f0;
            font-size: 14px;
            color: #333;
        }

        .registrations-table tbody tr:hover {
            background: #fafafa;
        }

        .no-data {
            text-align: center;
            color: #999;
            padding: 40px 20px !important;
        }
    </style>
@endsection
