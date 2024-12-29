@extends('layouts.app')
@section('content')
    <section class="min-h-[calc(100vh_-_72px)] bg-slate-100 p-8 md:p-12 lg:p-16">
        <main class="grid min-h-screen w-full rounded-lg bg-white p-2 md:p-6 lg:p-8">
            <h1 class="py-7 text-center text-2xl font-bold text-slate-900 md:py-14 md:text-4xl lg:py-28 lg:text-6xl">Total
                Vote: <span class="text-5xl md:text-7xl lg:text-9xl" id="total"></span></h1>

            <div id="osis-data-container" class="grid justify-center lg:grid-cols-2 lg:gap-8">
                <div id="osis-chart" class="h-[250px] w-full md:h-[350px] lg:h-[500px]"><canvas></canvas></div>
                <div class="grid h-[250px] items-start justify-center md:h-[350px] lg:h-[500px] lg:place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] text-2xl font-bold text-slate-900 md:text-4xl lg:text-6xl"
                                    colspan="3">Data Vote OSIS</td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-rose-400 md:text-2xl lg:text-3xl">No. Urut 1: </td>
                                <td class="text-2xl font-semibold text-rose-400 md:text-3xl lg:text-4xl" id="osis-1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-indigo-400 md:text-2xl lg:text-3xl">No. Urut 2: </td>
                                <td class="text-2xl font-semibold text-indigo-400 md:text-3xl lg:text-4xl" id="osis-2">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-sky-400 md:text-2xl lg:text-3xl">No. Urut 3: </td>
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

            <div id="mpk-data-container" class="grid justify-center lg:grid-cols-2">
                <div
                    class="order-1 grid h-[250px] items-start justify-center md:h-[350px] lg:order-none lg:h-[500px] lg:place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] text-2xl font-bold text-slate-900 md:text-4xl lg:text-6xl"
                                    colspan="2">Data Vote MPK
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-amber-400 md:text-2xl lg:text-3xl">No. Urut 1: </td>
                                <td class="text-2xl font-semibold text-amber-400 md:text-3xl lg:text-4xl" id="mpk-1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl font-semibold text-emerald-400 md:text-2xl lg:text-3xl">No. Urut 2: </td>
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
                <div id="mpk-chart" class="h-[250px] w-full md:h-[350px] lg:h-[500px]"><canvas></canvas></div>
            </div>

        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const osisCtx = document.querySelector('#osis-chart canvas').getContext('2d');
        const mpkCtx = document.querySelector('#mpk-chart canvas').getContext('2d');

        let osisVoteChart;
        let mpkVoteChart;

        function updateVoteCounts(datas) {
            document.querySelector("#total").textContent = datas.total ?? 0;

            document.querySelector("#osis-1").textContent = datas.osis.data[0]?.count ?? 0;
            document.querySelector("#osis-2").textContent = datas.osis.data[1]?.count ?? 0;
            document.querySelector("#osis-3").textContent = datas.osis.data[2]?.count ?? 0;
            document.querySelector("#total-osis").textContent = datas.osis.total;

            document.querySelector("#mpk-1").textContent = datas.mpk.data[0]?.count ?? 0;
            document.querySelector("#mpk-2").textContent = datas.mpk.data[1]?.count ?? 0;
            document.querySelector("#total-mpk").textContent = datas.mpk.total;
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

        function updateChart(datas) {
            osisVoteChart.data.datasets[0].data = datas.osis.data.map(vote => vote.count);
            osisVoteChart.update();
            mpkVoteChart.data.datasets[0].data = datas.mpk.data.map(vote => vote.count);
            mpkVoteChart.update();
        }

        async function fetchData() {
            try {
                const response = await fetch("/statistik/data");
                const datas = await response.json();

                if (osisVoteChart || mpkVoteChart) {
                    updateChart(datas)
                    updateVoteCounts(datas);
                    return;
                }

                if (!datas.osis.total) {
                    const container = document.querySelector('#osis-chart')
                    container.classList.add("statistik-text")
                    container.innerHTML = "Belum ada data"
                }

                if (!datas.mpk.total) {
                    const container = document.querySelector('#mpk-chart')
                    container.classList.add("statistik-text")
                    container.innerHTML = "Belum ada data"
                }

                osisVoteChart = createChart(
                    osisCtx,
                    datas.osis.data,
                    ['Nomor Urut 1', 'Nomor Urut 2', 'Nomor Urut 3'],
                    ['rgb(244, 63, 94, .75)', 'rgb(99, 102, 241, .75)', 'rgb(14, 165, 233, .75)']
                );

                mpkVoteChart = createChart(
                    mpkCtx,
                    datas.mpk.data,
                    ['Nomor Urut 1', 'Nomor Urut 2'],
                    ['rgb(245, 158, 11, .75)', 'rgb(16, 185, 129, .75)']
                );

            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        fetchData();
        fetchData();
    </script>
@endsection
