<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentiment Analysis Result</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .chart-container {
            width: 90%;
            height: 400px;
            margin: 20px auto;
        }
        canvas {
            max-width: 100%;
            height: 100% !important;
            border-radius: 10px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-back {
            display: inline-block;
            background-color:black;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
            margin: 10px 5px;
        }
        .btn-primary:hover, .btn-back:hover {
            background-color: #070707;
        }
    </style>
</head>
<body>
    <div style="position: absolute; top: 20px; left: 20px;">
        <button class="btn-back" onclick="history.back()">Go Back</button>
    </div>
    <div class="container">
        <h1>Sentiment Analysis of Comments</h1>
        <p>
            @if(isset($predominantSentiment))
                <strong>Predominant Sentiment:</strong>
                <span class="{{ $predominantSentiment }}">
                    {{ ucfirst($predominantSentiment) }}
                </span>
            @else
                <span>No sentiment data available.</span>
            @endif
        </p>

        <div class="chart-container">
            <canvas id="sentimentChart"></canvas>
        </div>
    </div>

    <script>
        const positiveCount = {{ $positiveCount }};
        const negativeCount = {{ $negativeCount }};
        const neutralCount = {{ $neutralCount }};

        const ctx = document.getElementById('sentimentChart').getContext('2d');
        const sentimentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Positive', 'Negative', 'Neutral'],
                datasets: [
                    {
                        label: 'Sentiments',
                        data: [positiveCount, negativeCount, neutralCount],
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                        fill: true,
                        tension: 0.4,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Comments',
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
