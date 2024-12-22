@extends("Layouts.app")
@section("content")
    @php
        $vote_counts = json_decode($vote_counts, true);
    @endphp
    <section class="min-h-[calc(100vh_-_72px)] bg-slate-100 p-16">
        @auth
            <audio src="assets/sounds/done_sound_for_admin.mp3"></audio>
        @endauth
        <main class="grid h-full w-full gap-16 rounded-lg bg-white p-8">
            <h1 class="text-center text-6xl font-bold">Total Vote <span id="total" class="block"></span></h1>

            <div class="flex h-[500px] gap-8">
                <canvas id="osisChart"></canvas>
                <div class="grid place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-6xl font-bold" colspan="3">Paslon OSIS</td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Paslon 1: </td>
                                <td class="text-4xl font-semibold" id="osis-1"></td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Paslon 2: </td>
                                <td class="text-4xl font-semibold" id="osis-2"></td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Paslon 3: </td>
                                <td class="text-4xl font-semibold" id="osis-3"></td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Total Vote: </td>
                                <td class="text-4xl font-semibold" id="total-osis"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="flex h-[500px] gap-8">
                <canvas id="mpkChart"></canvas>
                <div class="grid place-content-center">
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-6xl font-bold" colspan="2">Paslon MPK</td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Paslon 1: </td>
                                <td class="text-4xl font-semibold" id="mpk-1"></td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Paslon 2: </td>
                                <td class="text-4xl font-semibold" id="mpk-2"></td>
                            </tr>
                            <tr>
                                <td class="text-4xl font-semibold">Total Vote: </td>
                                <td class="text-4xl font-semibold" id="total-mpk"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        const osisCtx = document.getElementById('osisChart').getContext('2d');
        const mpkCtx = document.getElementById('mpkChart').getContext('2d');

        let osisVoteChart;
        let mpkVoteChart;

        function updateVoteCounts(data) {
            document.querySelector("#total").textContent = data.total.all.count;

            document.querySelector("#osis-1").textContent = data.osis[0].count;
            document.querySelector("#osis-2").textContent = data.osis[1].count;
            document.querySelector("#osis-3").textContent = data.osis[2].count;
            document.querySelector("#total-osis").textContent = data.total.osis.count;

            document.querySelector("#mpk-1").textContent = data.mpk[0].count;
            document.querySelector("#mpk-2").textContent = data.mpk[1].count;
            document.querySelector("#total-mpk").textContent = data.total.mpk.count;
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
                    ['rgb(251, 113, 133)', 'rgb(167, 139, 250)', 'rgb(56, 189, 248)']
                );

                mpkVoteChart = createChart(
                    mpkCtx,
                    data.mpk,
                    ['Paslon 1', 'Paslon 2'],
                    ['rgb(251, 113, 133)', 'rgb(167, 139, 250)']
                );
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        fetchData();
        setInterval(fetchData, 5000);
    </script>
@endsection
