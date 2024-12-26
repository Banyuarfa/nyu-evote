@extends('Layouts.app')
@section('content')
    <section class="min-h-[calc(100vh_-_72px)] bg-slate-100 p-8 md:p-12 lg:p-16">
        <main class="grid min-h-screen w-full rounded-lg bg-white p-2 md:p-6 lg:p-8">
            <h1 class="py-7 text-center text-2xl font-bold text-slate-900 md:py-14 md:text-4xl lg:py-28 lg:text-6xl">Total
                Vote: <span class="text-5xl md:text-7xl lg:text-9xl" id="total"></span></h1>

            <div class="grid justify-center lg:grid-cols-2 lg:gap-8">
                <div class="h-[250px] w-full md:h-[350px] lg:h-[500px]"><canvas id="osisChart"></canvas></div>

                <div class="grid h-[250px] items-start justify-center md:h-[350px] lg:h-[500px] lg:place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] text-2xl font-bold text-slate-900 md:text-4xl lg:text-6xl"
                                    colspan="3">Paslon OSIS</td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-rose-400 md:text-2xl lg:text-3xl">Paslon 1: </td>
                                <td class="text-2xl font-semibold text-rose-400 md:text-3xl lg:text-4xl" id="osis-1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-indigo-400 md:text-2xl lg:text-3xl">Paslon 2: </td>
                                <td class="text-2xl font-semibold text-indigo-400 md:text-3xl lg:text-4xl" id="osis-2">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-sky-400 md:text-2xl lg:text-3xl">Paslon 3: </td>
                                <td class="text-2xl font-semibold text-sky-400 md:text-3xl lg:text-4xl" id="osis-3"></td>
                            </tr>
                            <tr>
                                <td class="text-2xl font-bold text-slate-600 md:text-3xl lg:text-4xl">Total Vote: </td>
                                <td class="text-2xl font-bold text-slate-600 md:text-3xl lg:text-4xl" id="total-osis"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="grid justify-center lg:grid-cols-2">
                <div
                    class="order-1 grid h-[250px] items-start justify-center md:h-[350px] lg:order-none lg:h-[500px] lg:place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] text-2xl font-bold text-slate-900 md:text-4xl lg:text-6xl"
                                    colspan="2">Paslon MPK
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-amber-400 md:text-2xl lg:text-3xl">Paslon 1: </td>
                                <td class="text-2xl font-semibold text-amber-400 md:text-3xl lg:text-4xl" id="mpk-1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-emerald-400 md:text-2xl lg:text-3xl">Paslon 2: </td>
                                <td class="text-2xl font-semibold text-emerald-400 md:text-3xl lg:text-4xl" id="mpk-2">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-2xl font-bold text-slate-600 md:text-3xl lg:text-4xl">Total Vote: </td>
                                <td class="text-2xl font-bold text-slate-600 md:text-3xl lg:text-4xl" id="total-mpk"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="h-[250px] w-full md:h-[350px] lg:h-[500px]"><canvas id="mpkChart"></canvas></div>

            </div>

        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const osisCtx = document.getElementById('osisChart').getContext('2d');
        const mpkCtx = document.getElementById('mpkChart').getContext('2d');

        let osisVoteChart;
        let mpkVoteChart;

        function updateVoteCounts(data) {
            document.querySelector("#total").textContent = data.total.all;

            document.querySelector("#osis-1").textContent = data.osis[0].count;
            document.querySelector("#osis-2").textContent = data.osis[1].count;
            document.querySelector("#osis-3").textContent = data.osis[2].count;
            document.querySelector("#total-osis").textContent = data.total.osis;

            document.querySelector("#mpk-1").textContent = data.mpk[0].count;
            document.querySelector("#mpk-2").textContent = data.mpk[1].count;
            document.querySelector("#total-mpk").textContent = data.total.mpk;
        }

        function createChart(chart, data, labels, colors) {
            return new Chart(chart, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Votes',
                        data: data.map(vote => vote.count),
                        backgroundColor: colors,
                    }],
                },
            });
        }

        function updateChart(data) {
            osisVoteChart.data.datasets[0].data = data.osis.map(vote => vote.count);
            osisVoteChart.update();
            mpkVoteChart.data.datasets[0].data = data.mpk.map(vote => vote.count);
            mpkVoteChart.update();
        }

        async function fetchData() {
            try {
                const response = await fetch("/statistik/data");
                const data = await response.json();

                if (osisVoteChart || mpkVoteChart) {
                    updateChart(data)
                    updateVoteCounts(data);
                    return;
                }

                osisVoteChart = createChart(
                    osisCtx,
                    data.osis,
                    ['Paslon 1', 'Paslon 2', 'Paslon 3'],
                    ['rgb(244, 63, 94, .75)', 'rgb(99, 102, 241, .75)', 'rgb(14, 165, 233, .75)']
                );

                mpkVoteChart = createChart(
                    mpkCtx,
                    data.mpk,
                    ['Paslon 1', 'Paslon 2'],
                    ['rgb(245, 158, 11, .75)', 'rgb(16, 185, 129, .75)']
                );
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        fetchData();
        fetchData();
        setInterval(fetchData, 5000);
    </script>
@endsection
