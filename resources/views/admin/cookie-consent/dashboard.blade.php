<x-layouts.app title="Cookie Consent Analytics" menu="Analytics">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-primary">Cookie Consent Analytics</h1>
                <p class="text-secondary mt-1">Monitor and analyze user cookie preferences</p>
            </div>

            <div class="flex items-center gap-3 mt-4 sm:mt-0">
                <a href="{{ route('admin.cookie-consent.export', ['from' => $from, 'to' => $to]) }}"
                   class="inline-flex items-center gap-x-2 px-3 py-2 text-xs font-medium rounded-lg border border-primary text-secondary hover:bg-secondary transition-colors">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export Data
                </a>

                <form action="{{ route('admin.cookie-consent.cleanup') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to clean expired consent records?')"
                            class="inline-flex items-center gap-x-2 px-3 py-2 text-xs font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Cleanup
                    </button>
                </form>
            </div>
        </div>

        <!-- Date Range Filter -->
        <div class="bg-primary border border-primary rounded-xl p-4">
            <form method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label for="from" class="block text-sm font-medium text-primary mb-1">From Date</label>
                    <input type="date" id="from" name="from" value="{{ $from }}"
                           class="w-full px-3 py-2 border border-primary rounded-lg text-primary bg-primary focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex-1">
                    <label for="to" class="block text-sm font-medium text-primary mb-1">To Date</label>
                    <input type="date" id="to" name="to" value="{{ $to }}"
                           class="w-full px-3 py-2 border border-primary rounded-lg text-primary bg-primary focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Apply Filter
                </button>
            </form>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Consents -->
            <div class="bg-primary border border-primary rounded-xl p-6">
                <div class="flex items-center">
                    <div class="icon-container-blue">
                        <svg class="size-6 icon-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-secondary">Total Consents</p>
                        <p class="text-2xl font-bold text-primary">{{ number_format($stats['total']) }}</p>
                    </div>
                </div>
            </div>

            <!-- Accepted -->
            <div class="bg-primary border border-primary rounded-xl p-6">
                <div class="flex items-center">
                    <div class="icon-container-green">
                        <svg class="size-6 icon-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-secondary">Accepted</p>
                        <p class="text-2xl font-bold text-green-600">{{ number_format($stats['accepted']) }}</p>
                        <p class="text-xs text-secondary">{{ $stats['acceptance_rate'] }}% acceptance rate</p>
                    </div>
                </div>
            </div>

            <!-- Rejected -->
            <div class="bg-primary border border-primary rounded-xl p-6">
                <div class="flex items-center">
                    <div class="icon-container-red">
                        <svg class="size-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-secondary">Rejected</p>
                        <p class="text-2xl font-bold text-red-600">{{ number_format($stats['rejected']) }}</p>
                        <p class="text-xs text-secondary">{{ $stats['rejection_rate'] }}% rejection rate</p>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="bg-primary border border-primary rounded-xl p-6">
                <div class="flex items-center">
                    <div class="icon-container-purple">
                        <svg class="size-6 icon-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-secondary">Conversion Rate</p>
                        <p class="text-2xl font-bold text-primary">{{ $stats['acceptance_rate'] }}%</p>
                        <p class="text-xs text-secondary">Users accepting cookies</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Chart -->
        @if($dailyStats->count() > 0)
        <div class="bg-primary border border-primary rounded-xl p-6">
            <h3 class="text-lg font-semibold text-primary mb-4">Daily Consent Trends</h3>
            <div class="h-64 flex items-end justify-between gap-2">
                @foreach($dailyStats as $stat)
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-full flex flex-col items-center gap-1">
                            <!-- Accepted bar -->
                            @if($stats['total'] > 0)
                                <div class="w-full bg-green-500 rounded-t"
                                     style="height: {{ ($stat->accepted / max($dailyStats->pluck('total')->max(), 1)) * 200 }}px"
                                     title="Accepted: {{ $stat->accepted }}"></div>
                                <!-- Rejected bar -->
                                <div class="w-full bg-red-500 rounded-b"
                                     style="height: {{ ($stat->rejected / max($dailyStats->pluck('total')->max(), 1)) * 200 }}px"
                                     title="Rejected: {{ $stat->rejected }}"></div>
                            @endif
                        </div>
                        <div class="text-xs text-secondary mt-2 transform rotate-45 origin-left whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($stat->date)->format('M d') }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center gap-6 mt-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-green-500 rounded"></div>
                    <span class="text-sm text-secondary">Accepted</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-red-500 rounded"></div>
                    <span class="text-sm text-secondary">Rejected</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Recent Consents -->
        <div class="bg-primary border border-primary rounded-xl p-6">
            <h3 class="text-lg font-semibold text-primary mb-4">Recent Consent Records</h3>

            @if($recentConsents->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-primary">
                                <th class="text-left py-3 px-2 text-secondary font-medium">Date</th>
                                <th class="text-left py-3 px-2 text-secondary font-medium">User</th>
                                <th class="text-left py-3 px-2 text-secondary font-medium">IP Address</th>
                                <th class="text-left py-3 px-2 text-secondary font-medium">Decision</th>
                                <th class="text-left py-3 px-2 text-secondary font-medium">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentConsents as $consent)
                                <tr class="border-b border-primary/50">
                                    <td class="py-3 px-2 text-primary">
                                        {{ $consent->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td class="py-3 px-2 text-primary">
                                        {{ $consent->user->name ?? 'Guest' }}
                                        @if($consent->user)
                                            <div class="text-xs text-secondary">{{ $consent->user->email }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3 px-2 text-secondary font-mono text-xs">
                                        {{ $consent->ip_address }}
                                    </td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            {{ $consent->consent_type === 'accepted' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' }}">
                                            {{ ucfirst($consent->consent_type) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-2 text-xs text-secondary">
                                        @if($consent->consent_details)
                                            <div class="space-y-1">
                                                @if(isset($consent->consent_details['analytics']))
                                                    <div>Analytics: {{ $consent->consent_details['analytics'] ? 'Yes' : 'No' }}</div>
                                                @endif
                                                @if(isset($consent->consent_details['marketing']))
                                                    <div>Marketing: {{ $consent->consent_details['marketing'] ? 'Yes' : 'No' }}</div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted">No details</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto size-12 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-primary">No consent records</h3>
                    <p class="mt-1 text-sm text-secondary">No consent records found for the selected date range.</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>

<style>
.icon-container-red {
    width: 3rem;
    height: 3rem;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(254 226 226); /* red-100 */
}

.dark .icon-container-red {
    background-color: rgb(127 29 29); /* red-900 */
}
</style>
