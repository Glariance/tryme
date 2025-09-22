<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TryMe | Smart Investment Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ecb848',
                        secondary: '#ecb848',
                        dark: '#1a1a2e',
                        darker: '#16213e',
                        accent: '#a06a10',
                        success: '#00b894',
                        warning: '#fdcb6e',
                        danger: '#d63031'
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .coin-spin {
            animation: spin 10s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        /* spinner css */
        .spinner-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 60px 20px;
        }

        .spinner-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        .spinner-image {
            flex: 1 1 300px;
            text-align: center;
        }

        .spinner-image img {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(160, 106, 16, 0.5);
        }

        .spinner-content {
            flex: 1 1 400px;
        }

        .spinner-content h2 {
            font-size: 32px;
            color: rgb(160, 106, 16);
            margin-bottom: 20px;
        }

        .spinner-content p {
            font-size: 18px;
            color: #e0e0e0;
            line-height: 1.6;
        }

        .spinner-content strong {
            color: rgb(160, 106, 16);
            /* gold/brown for winnings highlight */
        }

        .spinner-content a {
            display: inline-block;
            margin-top: 25px;
            background: rgb(160, 106, 16);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(160, 106, 16, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .spinner-content a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(160, 106, 16, 0.6);
        }

        @media (max-width: 768px) {
            .spinner-container {
                flex-direction: column;
            }

            .spinner-content,
            .spinner-image {
                text-align: center;
            }
        }
    </style>


</head>

<body class="gradient-bg text-white min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="container mx-auto px-4 py-6 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-10 h-auto">
        </div>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="hover:text-accent transition">Home</a>
            <a href="#how-it-works" class="hover:text-accent transition">How It Works</a>
            <a href="#daily-news" class="hover:text-accent transition">Daily News</a>
            <a href="#spinwin" class="hover:text-accent transition">Spin n Win</a>
            <a href="#features" class="hover:text-accent transition">Features</a>
            <a href="#referral" class="hover:text-accent transition">Referral</a>
            <a href="#packages" class="hover:text-accent transition">Packages</a>
            <a href="#faq" class="hover:text-accent transition">FAQ</a>
        </div>
        <div class="flex space-x-4 items-center">
            {{-- <button id="connectWalletBtn" class="bg-accent hover:bg-opacity-80 px-6 py-2 rounded-full font-medium transition">
            Connect Wallet
        </button> --}}



            @auth
                <a href="{{ route('dashboard') }}"
                    class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="javascript:void(0);" onclick="toggleAuthModal('signup')"
                    class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
                    Signup
                </a>
                <a href="javascript:void(0);" onclick="toggleAuthModal('login')"
                    class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
                    Login
                </a>
            @endauth

        </div>
        <button class="md:hidden">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="container mx-auto px-4 py-16 md:py-24 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-12 md:mb-0">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Earn <span class="text-accent">4 to 10% Daily</span> From Real Trading Profits
            </h1>
            <p class="text-lg text-gray-300 mb-8">
                Join our sustainable investment platform powered by professional crypto and forex trading strategies.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="javascript:void(0);" onclick="toggleAuthModal('signup')"
                    class="bg-accent hover:bg-opacity-80 px-8 py-3 rounded-full font-medium transition">
                    Start Earning Now
                </a>
                <a href="#how-it-works"
                    class="border border-accent text-accent hover:bg-accent hover:bg-opacity-10 px-8 py-3 rounded-full font-medium transition">
                    How It Works
                </a>
            </div>
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="glass-card p-4 rounded-lg">
                    <div class="text-2xl font-bold text-accent">15,892+</div>
                    <div class="text-sm text-gray-300">Active Users</div>
                </div>
                <div class="glass-card p-4 rounded-lg">
                    <div class="text-2xl font-bold text-accent">$4.2M+</div>
                    <div class="text-sm text-gray-300">Total Invested</div>
                </div>
                <div class="glass-card p-4 rounded-lg">
                    <div class="text-2xl font-bold text-accent">$1.8M+</div>
                    <div class="text-sm text-gray-300">Paid Out</div>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 relative">
            <div class="relative max-w-md mx-auto">
                <!-- Background Glow -->
                <div
                    class="absolute -top-10 -left-10 w-32 h-32 bg-primary rounded-full filter blur-3xl opacity-20 animate-pulse-slow">
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-32 h-32 bg-accent rounded-full filter blur-3xl opacity-20 animate-pulse-slow">
                </div>

                <!-- Calculator Card -->

                <div class="flex justify-center">
                    <div class="relative w-full max-w-md">
                        <div class="bg-gray-800 rounded-xl shadow-2xl p-6 text-gray-200 floating">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-bold text-lg text-white">Daily ROI Calculator</h3>
                                <div class="bg-accent text-white px-3 py-1 rounded-full text-sm font-bold">4% to 10%
                                    Daily</div>
                            </div>

                            <!-- Investment Amount -->
                            <div class="mb-4">
                                <label for="investmentAmount" class="block text-gray-400 mb-2">Investment Amount
                                    ($)</label>
                                <select id="investmentAmount"
                                    class="w-full border border-gray-700 bg-gray-900 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-accent">
                                    <option value="25">25 USD</option>
                                    <option value="50">50 USD</option>
                                    <option value="75">75 USD</option>
                                    <option value="100">100 USD</option>
                                    <option value="500">500 USD</option>
                                    <option value="1000">1000 USD</option>
                                </select>
                            </div>

                            <!-- Pool Range -->
                            <div class="mb-4">
                                <label for="poolRange" class="block text-gray-400 mb-2">Pool Size (select range)</label>
                                <select id="poolRange"
                                    class="w-full border border-gray-700 bg-gray-900 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-accent">
                                    <option value="$10,000 - $25,000" data-percent="4">$10,000 - $25,000</option>
                                    <option value="$25,000 - $50,000" data-percent="5">$25,000 - $50,000</option>
                                    <option value="$50,000 - $100,000" data-percent="6">$50,000 - $100,000</option>
                                    <option value="$100,000 - $150,000" data-percent="7">$100,000 - $150,000</option>
                                    <option value="$150,000 - $200,000" data-percent="8">$150,000 - $200,000</option>
                                    <option value="$200,000 - $300,000" data-percent="9">$200,000 - $300,000</option>
                                    <option value="$300,000+" data-percent="10">$300,000+</option>
                                </select>
                            </div>

                            <!-- Pool Info -->
                            <div class="bg-gray-900 rounded-lg p-4 mb-4">
                                <div class="flex justify-between">
                                    <span id="poolRangeLabel" class="text-gray-400">$10,000 - $25,000</span>
                                    <span id="poolPercentDisplay" class="font-bold text-accent">Daily Profit:
                                        4%</span>
                                </div>
                            </div>

                            <!-- Fixed Period -->
                            <div class="mb-6">
                                <div class="flex items-center space-x-2">
                                    <button class="bg-accent text-white px-4 py-2 rounded-lg font-medium">40
                                        Days</button>
                                    <span class="text-gray-400">Fixed Period</span>
                                </div>
                            </div>

                            <!-- Results -->
                            <div class="bg-gray-900 rounded-lg p-4 mb-6">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-400">Daily ROI</span>
                                    <span id="dailyROI" class="font-bold text-accent">$0.00</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-400">Total ROI (40 days)</span>
                                    <span id="totalROI" class="font-bold text-accent">$0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Total Return</span>
                                    <span id="totalReturn" class="font-bold text-green-400">$0.00 (0%)</span>
                                </div>
                            </div>

                            <!-- Button -->
                            <button id="investBtn"
                                class="w-full bg-accent text-white py-3 rounded-lg font-bold hover:opacity-90 transition">
                                Invest Now
                            </button>

                            <!-- Tip -->
                            <p class="text-gray-500 text-sm mt-3">💡 Tip: Selecting the pool range will update the
                                daily percentage.</p>
                        </div>

                        <!-- Extra Glows -->
                        <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-primary rounded-full opacity-20"></div>
                        <div class="absolute -top-10 -right-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20"></div>
                    </div>
                </div>



                {{-- <div class="flex justify-center">
                    <div class="relative w-full max-w-md">
                        <div class="bg-gray-800 rounded-xl shadow-2xl p-6 text-gray-200 floating">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-bold text-lg text-white">Daily ROI Calculator</h3>
                                <div class="bg-accent text-white px-3 py-1 rounded-full text-sm font-bold">4 to 10% Daily
                                </div>
                            </div>

                            <!-- Investment Amount -->
                            <div class="mb-4">
                                <label class="block text-gray-400 mb-2">Investment Amount ($)</label>
                                <div class="relative">
                                    <input type="number" id="investment-amount"
                                        class="w-full border border-gray-700 bg-gray-900 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-accent"
                                        placeholder="25" min="25" step="25">
                                    <span class="absolute right-4 top-3 text-gray-400">USD</span>
                                </div>
                            </div>

                            <!-- Investment Duration -->
                            <div class="mb-6">
                                <label class="block text-gray-400 mb-2">Investment Duration</label>
                                <div class="flex items-center space-x-2">
                                    <button class="bg-accent text-white px-4 py-2 rounded-lg font-medium">40
                                        Days</button>
                                    <span class="text-gray-400">Fixed Period</span>
                                </div>
                            </div>

                            <!-- ROI Info -->
                            <div class="bg-gray-900 rounded-lg p-4 mb-6">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-400">Daily ROI</span>
                                    <span id="daily-roi" class="font-bold text-accent">$1.00</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-400">Total ROI (40 days)</span>
                                    <span id="total-roi" class="font-bold text-accent">$40.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Total Return</span>
                                    <span id="total-return" class="font-bold text-green-400">$40.00 (160%)</span>
                                </div>
                            </div>

                            <!-- Button -->
                            <button onclick="toggleAuthModal('signup')"
                                class="w-full bg-accent text-white py-3 rounded-lg font-bold hover:opacity-90 transition">
                                Invest Now
                            </button>
                        </div>

                        <!-- Extra Glows -->
                        <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-primary rounded-full opacity-20"></div>
                        <div class="absolute -top-10 -right-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20"></div>
                    </div>
                </div> --}}

            </div>
        </div>

    </section>


    <!-- How It Works Section -->

    <div class="mt-16 bg-gray-900 rounded-xl shadow-lg overflow-hidden" id="how-it-works">
        <div class="md:flex items-stretch">

            <!-- LEFT SIDE -->
            <div class="md:w-1/2 p-8 md:p-12 text-white flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-4" style="color: rgb(160, 106, 16);">
                        How Our Crypto & Forex Pool Works
                    </h2>
                    <p class="text-gray-300 mb-6">
                        We've launched a smart Crypto + Forex Trading Pool starting with our own capital of $10,000.
                        Our professional trading team actively trades assets like Bitcoin (BTC), Ethereum (ETH), Solana
                        (SOL),
                        Dogecoin (DOGE), and in the Gold Forex Market.
                    </p>

                    <p class="text-gray-300 mb-6">
                        Profits from these trades are shared daily with our investors based on the pool's total size.
                        The more the pool grows, the higher the daily profit percentage becomes.
                    </p>

                    <h3 class="text-2xl font-bold text-yellow-400 mb-4">Daily Profit Structure</h3>
                    <table class="w-full text-left border-collapse rounded-lg overflow-hidden shadow-lg mb-6">
                        <thead>
                            <tr class="bg-gray-800 text-yellow-400">
                                <th class="px-4 py-2 border-l-4 border-yellow-500">Pool Size</th>
                                <th class="px-4 py-2">Daily Profit</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300">
                            <tr class="bg-gray-900 hover:bg-gray-800">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$10,000 - $25,000</td>
                                <td class="px-4 py-2">4%</td>
                            </tr>
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$25,000 - $50,000</td>
                                <td class="px-4 py-2">5%</td>
                            </tr>
                            <tr class="bg-gray-900 hover:bg-gray-800">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$50,000 - $100,000</td>
                                <td class="px-4 py-2">6%</td>
                            </tr>
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$100,000 - $150,000</td>
                                <td class="px-4 py-2">7%</td>
                            </tr>
                            <tr class="bg-gray-900 hover:bg-gray-800">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$150,000 - $200,000</td>
                                <td class="px-4 py-2">8%</td>
                            </tr>
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$200,000 - $300,000</td>
                                <td class="px-4 py-2">9%</td>
                            </tr>
                            <tr class="bg-gray-900 hover:bg-gray-800">
                                <td class="px-4 py-2 border-l-4 border-yellow-500">$300,000 - $400,000+</td>
                                <td class="px-4 py-2">10%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-gray-300">
                    Our system is designed to reward long-term participation and pool growth.
                    Whether you're starting with just $25 or investing a larger amount, your funds are
                    professionally managed in real-time markets to generate consistent daily returns.
                </p>
            </div>


            <!-- RIGHT SIDE -->
            <div class="md:w-1/2 bg-gray-800 p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-900 rounded-lg border border-gray-700 shadow-lg p-3">
                        <iframe
                            src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_btc&symbol=BINANCE:BTCUSDT&interval=60&theme=dark"
                            width="100%" height="250"></iframe>
                    </div>
                    <div class="bg-gray-900 rounded-lg border border-gray-700 shadow-lg p-3">
                        <iframe
                            src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_eth&symbol=BINANCE:ETHUSDT&interval=60&theme=dark"
                            width="100%" height="250"></iframe>
                    </div>
                    <div class="bg-gray-900 rounded-lg border border-gray-700 shadow-lg p-3">
                        <iframe
                            src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_sol&symbol=BINANCE:SOLUSDT&interval=60&theme=dark"
                            width="100%" height="250"></iframe>
                    </div>
                    <div class="bg-gray-900 rounded-lg border border-gray-700 shadow-lg p-3">
                        <iframe
                            src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_doge&symbol=BINANCE:DOGEUSDT&interval=60&theme=dark"
                            width="100%" height="250"></iframe>
                    </div>
                    <div class="bg-gray-900 rounded-lg border border-gray-700 shadow-lg p-3 sm:col-span-2">
                        <iframe
                            src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold&symbol=OANDA:XAUUSD&interval=60&theme=dark"
                            width="100%" height="250"></iframe>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <!-- TradingView Script -->
    {{-- <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script>
        const charts = [{
                id: "tradingview_chart",
                symbol: "COINBASE:BTCUSD"
            },
            {
                id: "tradingview_sol_chart",
                symbol: "BINANCE:SOLUSDT"
            },
            {
                id: "tradingview_eth_chart",
                symbol: "COINBASE:ETHUSD"
            },
            {
                id: "tradingview_doge_chart",
                symbol: "BINANCE:DOGEUSDT"
            }
        ];

        charts.forEach(chart => {
            new TradingView.widget({
                width: "100%",
                height: 300,
                symbol: chart.symbol,
                interval: "D",
                timezone: "Etc/UTC",
                theme: "light",
                style: "1",
                locale: "en",
                toolbar_bg: "#f1f3f6",
                enable_publishing: false,
                allow_symbol_change: true,
                hide_top_toolbar: false,
                hide_legend: false,
                save_image: true,
                container_id: chart.id
            });
        });
    </script> --}}



    <!-- Spinner Section Start -->
    <section class="spinner-section">
        <div class="spinner-container">

            <!-- Spinner Image -->
            <div class="spinner-image">
                <img src="{{ asset('assets/images/spinner.png') }}" alt="Spinner Image">
            </div>

            <!-- Spinner Description -->
            <div class="spinner-content" id="spinwin">
                <h2>🎉 Spin to Win Exciting Discounts!</h2>
                <p>
                    After signing up, you'll get a chance to spin the wheel and win a surprise discount! 🤑<br><br>
                    Possible winnings include: <strong>$0.1</strong>, <strong>$0.5</strong>, <strong>$1</strong>,
                    <strong>$2</strong>, <strong>$3</strong>, <strong>$5</strong>, <strong>$25</strong>,
                    <strong>$50</strong> 💰<br><br>
                    Don't miss your chance to grab a deal - Sign up now and take a spin! 🔁
                </p>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="javascript:void(0);" onclick="toggleAuthModal('signup')">Sign Up & Spin</a>
                @endauth
            </div>

        </div>
    </section>
    <!-- Spinner Section End -->


    <!-- Features Section -->
    <section class="py-16 bg-darker" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How TradEarn<span class="text-accent"> Pro
                        Works</span>
                </h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Our platform combines investment opportunities with
                    professional trading to generate sustainable returns.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-accent bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-percentage text-2xl text-accent"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Choose Your Package</h3>
                    <p class="text-gray-300">Select from our range of investment packages starting at just $25. Each
                        offers 4 to 10% daily ROI for 40 days.</p>
                </div>
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fund Your Account</h3>
                    <p class="text-gray-300">Deposit USDT or USDC via Binance Smart Chain or Tron network to activate
                        your investment.</p>
                </div>
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-accent bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-lock text-2xl text-accent"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Earn Daily & Withdraw</h3>
                    <p class="text-gray-300">Withdraw your 4 to 10% daily ROI within 24 hours. Earn 160% total return
                        over 40
                        days.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Economic News Impact Section -->
    <section class="w-full bg-gray-800 py-12 px-6 md:px-16 text-gray-200" id="daily-news">
        <!-- Heading -->
        <div class="mt-16 bg-gray-900 rounded-xl shadow-lg overflow-hidden">
            <div class="md:flex items-stretch">

                <!-- Left Text Content -->
                <div class="md:w-1/2 p-8 md:p-12 text-white">
                    <h3 class="text-3xl font-bold mb-6">How Daily Global News Impacts Trading</h3>

                    <p class="text-gray-300 mb-6 leading-relaxed">
                        In financial markets, <span class="text-accent font-semibold">news is power</span>.
                        Major economic events such as <span class="text-white">interest rate decisions</span>,
                        <span class="text-white">inflation reports</span>, <span class="text-white">employment
                            data</span>,
                        or <span class="text-white">geopolitical developments</span> significantly affect market
                        volatility.
                        For traders in <strong class="text-accent">crypto, forex, commodities, or indices</strong>,
                        even a single press release can shift market sentiment instantly.
                    </p>

                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Every day, traders monitor global news to assess how events might affect price movements.
                        For example:
                    </p>

                    <ul class="list-disc list-inside text-gray-300 mb-6 space-y-2">
                        <li><strong class="text-white">Interest Rate Hikes</strong> from central banks usually
                            strengthen the local currency.</li>
                        <li><strong class="text-white">High Unemployment Data</strong> can weaken market confidence.
                        </li>
                        <li><strong class="text-white">Crypto regulation announcements</strong> can cause sudden spikes
                            or crashes in Bitcoin and altcoins.</li>
                    </ul>

                    <p class="text-gray-300 leading-relaxed">
                        That's why it's essential to stay updated with day-to-day economic events.
                        Below is a live calendar showing <strong class="text-accent">real-time global news</strong>
                        that directly influences trading activity.
                    </p>
                </div>

                <!-- Right Widget (same height as left) -->
                <div class="md:w-1/2 bg-gray-800 p-6 flex">
                    <div
                        class="bg-gray-900 rounded-lg border border-gray-700 overflow-hidden shadow-lg w-full flex flex-col">
                        <div class="tradingview-widget-container w-full flex-grow">
                            <div class="tradingview-widget-container__widget h-full"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                                {
                                    "colorTheme": "dark",
                                    "isTransparent": false,
                                    "width": "100%",
                                    "height": "100%",
                                    "locale": "en",
                                    "importanceFilter": "0,1,2"
                                }
                            </script>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>





    {{-- <section id="how-it-works" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How It <span class="text-accent">Works</span></h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Start earning in just a few simple steps.</p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-accent bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-accent bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-accent">1</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Connect Wallet</h3>
                    <p class="text-gray-300">Connect your MetaMask or WalletConnect wallet to get started.</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-primary bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-primary">2</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Make Investment</h3>
                    <p class="text-gray-300">Invest a minimum of $10 in USDT, BUSD or BNB.</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-secondary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div
                            class="w-16 h-16 bg-secondary bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-secondary">3</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Earn Daily ROI</h3>
                    <p class="text-gray-300">Start earning 2% daily return on your investment.</p>
                </div>
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-accent bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-accent bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-accent">4</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Withdraw Profits</h3>
                    <p class="text-gray-300">Withdraw your earnings anytime after 24 hours.</p>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Packages --}}
    <section id="packages" class="py-16 bg-gray-900">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-yellow-400 mb-4">Investment Packages</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">
                    Choose from our range of packages with guaranteed
                    <span class="text-yellow-400 font-semibold">4 to 10% daily returns</span> for 40 days.
                </p>
            </div>

            <!-- Packages Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Starter</h3>
                        <div class="text-4xl font-bold text-white">$25</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily
                            ROI ($1/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Return: $40 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                    </ul>



                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Bronze</h3>
                        <div class="text-4xl font-bold text-white">$50</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily
                            ROI ($2/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Return: $80 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                    </ul>
                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Silver</h3>
                        <div class="text-4xl font-bold text-white">$75</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily
                            ROI ($3/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Returns: $120 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                    </ul>
                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Gold</h3>
                        <div class="text-4xl font-bold text-white">$100</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily
                            ROI ($4/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Returns: $160 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                    </ul>
                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Platinum</h3>
                        <div class="text-4xl font-bold text-white">$500</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily
                            ROI ($20/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Returns: $800 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                    </ul>
                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

                <!-- Package Card -->
                <div
                    class="bg-gray-800 p-6 rounded-xl shadow-lg border border-yellow-500 hover:scale-105 transition-transform">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-yellow-400 mb-2">Diamond</h3>
                        <div class="text-4xl font-bold text-white">$1000</div>
                    </div>
                    <ul class="space-y-3 mb-6 text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>4 to 10%
                            Daily ROI ($40/day)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>40 Days
                            Duration</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>Total
                            Returns: $1600 (160%)</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>2%
                            Referral Commission</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-yellow-400 mr-2"></i>VIP
                            Support</li>
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-yellow-400 mr-2"></i>Exclusive Updates</li>
                    </ul>
                    <a href="javascript:void(0);"
                        class="package-btn bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                        Select Package
                    </a>
                    {{-- <button
                        onclick="toggleAuthForm('signup')"
                        class="w-full bg-yellow-400 text-gray-900 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition">Select
                        Package</button> --}}
                </div>

            </div>

            <!-- View All -->
            {{-- <div class="mt-8 text-center">
                <button class="text-yellow-400 font-semibold hover:underline">View All Packages</button>
            </div> --}}
        </div>
    </section>




    <!-- Investment Calculator -->

    <section class="py-16 bg-darker" id="referral">
        <div class="container mx-auto px-4">

            <!-- Title -->
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-accent">Earn With Our Referral System</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">
                    Get <span class="text-accent font-semibold">2% commission</span> on every package purchased by your
                    referrals.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Left Column -->
                <div>
                    <div class="bg-dark-card p-8 rounded-xl shadow-md mb-8">
                        <h3 class="text-xl font-bold mb-4 text-primary">How Referrals Work</h3>
                        <ul class="space-y-3 text-gray-200">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                                <span>Share your unique referral link with friends</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                                <span>When they sign up and purchase a package, you earn <span
                                        class="font-semibold text-accent">2%</span> of their package value</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                                <span>Commission is based on your current package amount</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-accent mt-1 mr-2"></i>
                                <span>No limit to how many people you can refer</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-accent/10 p-6 rounded-xl text-gray-200">
                        <h4 class="font-bold mb-3 text-accent">Commission Examples:</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-dark-card p-3 rounded-lg">
                                <div>
                                    <span class="font-medium">Your Package:</span>
                                    <span class="font-bold">$25</span>
                                </div>
                                <div>
                                    <span class="font-medium">Referral Buys:</span>
                                    <span class="font-bold">$100</span>
                                </div>
                                <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold">
                                    +$0.50
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-dark-card p-3 rounded-lg">
                                <div>
                                    <span class="font-medium">Your Package:</span>
                                    <span class="font-bold">$1000</span>
                                </div>
                                <div>
                                    <span class="font-medium">Referral Buys:</span>
                                    <span class="font-bold">$25</span>
                                </div>
                                <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold">
                                    +$20.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>

                    <div class="bg-white p-8 rounded-xl shadow-md border border-primary/30">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-primary">Your Referral Dashboard</h3>
                            <div class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-bold">Demo</div>
                        </div>

                        @php
                            $referralLink = 'https://tryme.com?ref=johndoe123';
                        @endphp
                        <div class="mb-6">
                            <label class="block text-brown-700 mb-2 font-medium">Your Referral Link</label>
                            <div class="flex">
                                <input type="text" style="color: #92400e;"
                                    class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                                    value="{{ $referralLink }}" readonly>
                                <button
                                    class="bg-primary text-white px-4 rounded-r-lg hover:bg-primary-dark transition"
                                    onclick="copyToClipboard('referralLink')">
                                    <p id="referralLink" class="hidden">{{ $referralLink }}</p>
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>



                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-primary">12</div>
                                <div class="text-gray-600">Total Referrals</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-primary">$86.50</div>
                                <div class="text-gray-600">Total Earned</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2 font-medium">Your Current Package</label>
                            <div class="bg-primary/10 text-primary px-4 py-2 rounded-lg font-medium">$100 (Advanced)
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2 font-medium">Next Referral Commission</label>
                            <div class="text-xl font-bold text-primary">$2.00 per referred package</div>
                        </div>

                        <button
                            class="w-full gradient-bg text-white py-3 rounded-lg font-bold hover:opacity-90 transition">Upgrade
                            Package</button>
                    </div>
                </div>


            </div>
        </div>
    </section>


    {{-- <section class="py-16 bg-darker">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto glass-card p-8 rounded-xl">
                <h2 class="text-3xl font-bold mb-6 text-center">Investment <span class="text-accent">Calculator</span>
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Investment Amount ($)</label>
                            <input type="range" min="10" max="10000" value="500" step="10"
                                class="w-full" id="investmentAmount">
                            <div class="flex justify-between mt-2">
                                <span>$10</span>
                                <span id="currentAmount">$500</span>
                                <span>$10,000</span>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Investment Period (days)</label>
                            <input type="range" min="1" max="365" value="30" class="w-full"
                                id="investmentPeriod">
                            <div class="flex justify-between mt-2">
                                <span>1 day</span>
                                <span id="currentPeriod">30 days</span>
                                <span>365 days</span>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Referrals (direct)</label>
                            <input type="range" min="0" max="50" value="5" class="w-full"
                                id="referralCount">
                            <div class="flex justify-between mt-2">
                                <span>0</span>
                                <span id="currentReferrals">5</span>
                                <span>50</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="glass-card p-6 rounded-lg mb-6">
                            <h3 class="text-lg font-bold mb-4">Projected Earnings</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-300">Daily ROI (2%)</span>
                                    <span class="font-bold" id="dailyRoi">$10.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-300">Total ROI</span>
                                    <span class="font-bold" id="totalRoi">$300.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-300">Referral Income</span>
                                    <span class="font-bold" id="referralIncome">$25.00</span>
                                </div>
                                <div class="border-t border-gray-700 my-2"></div>
                                <div class="flex justify-between text-lg">
                                    <span class="font-bold">Total Earnings</span>
                                    <span class="font-bold text-accent" id="totalEarnings">$325.00</span>
                                </div>
                            </div>
                        </div>
                        <button class="w-full bg-accent hover:bg-opacity-80 py-3 rounded-full font-medium transition">
                            Connect Wallet to Invest
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- FAQ Section -->
    <section id="faq" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Frequently Asked <span class="text-accent">Questions</span>
                </h2>
                <p class="text-gray-300 max-w-2xl mx-auto">
                    Find answers to common questions about our platform.
                </p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">How does the investment platform work?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer">
                        Our platform allows users to invest in predefined packages and earn a fixed 4 to 10% daily ROI.
                        These
                        returns are generated from live trading activities such as crypto spot/futures trading,
                        scalping, and forex arbitrage. Users also benefit from a one-time referral commission system
                        when they invite others to join.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">Where does the platform generate profit from?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        All user returns are funded from our in-house trading desk, which operates in:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Spot and Futures Crypto Trading</li>
                            <li>Short-Term Scalping Strategies</li>
                            <li>Forex Arbitrage Opportunities</li>
                            <li>Risk-Managed Portfolio Allocations</li>
                        </ul>
                        This trading activity ensures the sustainability and legitimacy of all payouts.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">Is the ROI model sustainable in the long run?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        Yes. Since the ROI is backed by actual trading profits and not dependent on new user deposits,
                        the model is designed for long-term sustainability. We do not operate any Ponzi-based structure
                        or external yield dependency.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">Are the trading profits audited or verified?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        Our platform is committed to transparency and accountability. Trading activities are conducted
                        under a monitored environment, with detailed logs available for audits upon request. This
                        ensures users that their earnings are rooted in real and trackable market activity.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">What makes this platform different from typical investment
                            schemes?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        Unlike schemes that rely on the inflow of new investors to pay existing ones, our model is based
                        purely on daily profits from real-time trading. This structure:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Reduces risk of collapse</li>
                            <li>Ensures genuine, performance-based payouts</li>
                            <li>Supports a scalable user base without affecting the integrity of ROI</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">Do users need any trading experience to earn?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        Not at all. All trading is done by our professional desk. Users simply:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Choose a package</li>
                            <li>Earn daily returns</li>
                            <li>Withdraw manually within 24 hours</li>
                            <li>No technical trading knowledge is required to participate.</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="glass-card p-6 rounded-xl mb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-question">
                        <h3 class="text-lg font-bold">Is there a risk involved with the platform?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300 faq-answer hidden">
                        As with any financial system, there is always a level of market and operational risk. However,
                        we minimize this risk through:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Diversified trading strategies</li>
                            <li>Strict risk management protocols</li>
                            <li>Limited ROI promises (4%) to avoid over-leveraging</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wallet Connection Modal -->
    <div id="walletModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="glass-card p-8 rounded-xl max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">Connect Wallet</h3>
                <button id="closeWalletModal" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="space-y-4">
                <button
                    class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/metamask-logo.png" alt="MetaMask"
                            class="w-8 h-8 mr-3">
                        <span>MetaMask</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button
                    class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/walletconnect-logo.png" alt="WalletConnect"
                            class="w-8 h-8 mr-3">
                        <span>WalletConnect</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button
                    class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/trust-wallet-twt-logo.png" alt="Trust Wallet"
                            class="w-8 h-8 mr-3">
                        <span>Trust Wallet</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div class="mt-6 text-center text-sm text-gray-400">
                By connecting your wallet, you agree to our Terms of Service and Privacy Policy
            </div>
        </div>
    </div>

    <!-- Investment Modal -->
    <div id="investmentModal"
        class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="glass-card p-8 rounded-xl max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">Make Investment</h3>
                <button id="closeInvestmentModal" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Select Token</label>
                <div class="flex space-x-2">
                    <button
                        class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="USDT"
                            class="w-6 h-6 mr-2">
                        USDT
                    </button>
                    <button
                        class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/binance-usd-busd-logo.png" alt="BUSD"
                            class="w-6 h-6 mr-2">
                        BUSD
                    </button>
                    <button
                        class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/bnb-bnb-logo.png" alt="BNB" class="w-6 h-6 mr-2">
                        BNB
                    </button>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Investment Amount ($)</label>
                <div class="relative">
                    <input type="number" min="10" value="100"
                        class="w-full bg-gray-800 rounded-lg py-3 px-4 pr-16">
                    <div class="absolute right-3 top-3 text-gray-400">USD</div>
                </div>
                <div class="text-xs text-gray-400 mt-1">Minimum investment: $10</div>
            </div>
            <div class="glass-card p-4 rounded-lg mb-6">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-300">Daily ROI (2%)</span>
                    <span class="font-bold">$2.00</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-300">Contract Fee (1%)</span>
                    <span class="font-bold">$1.00</span>
                </div>
            </div>
            <button class="w-full bg-accent hover:bg-opacity-80 py-3 rounded-full font-medium transition">
                Confirm Investment
            </button>
        </div>
    </div>

    <!-- Dashboard (hidden by default) -->
    <div id="dashboard" class="fixed inset-0 bg-darker z-50 overflow-y-auto hidden">
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-coins text-2xl text-accent"></i>
                    <span class="text-xl font-bold">Crypto<span class="text-accent">Earn</span></span>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="disconnectWallet" class="text-gray-400 hover:text-white">
                        <i class="fas fa-sign-out-alt"></i> Disconnect
                    </button>
                    <button id="closeDashboard" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="glass-card p-6 rounded-xl">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="text-gray-300 mb-1">Total Invested</div>
                            <div class="text-2xl font-bold" id="totalInvested">$0.00</div>
                        </div>
                        <div class="bg-accent bg-opacity-10 p-3 rounded-lg">
                            <i class="fas fa-wallet text-accent"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="text-gray-300 mb-1">Available to Withdraw</div>
                            <div class="text-2xl font-bold text-success" id="availableToWithdraw">$0.00</div>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-lg">
                            <i class="fas fa-coins text-success"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="text-gray-300 mb-1">Total Earned</div>
                            <div class="text-2xl font-bold text-primary" id="totalEarned">$0.00</div>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-lg">
                            <i class="fas fa-chart-line text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Wallet Address</h3>
                    <div class="flex items-center bg-gray-800 rounded-lg p-3 mb-4">
                        <div class="truncate flex-1" id="walletAddress">0x000...0000</div>
                        <button class="text-accent ml-2" id="copyAddress">
                            <i class="far fa-copy"></i>
                        </button>
                    </div>
                    <div class="text-sm text-gray-400">Connected with MetaMask</div>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Referral Link</h3>
                    <div class="flex items-center bg-gray-800 rounded-lg p-3 mb-4">
                        <div class="truncate flex-1" id="referralLink">https:// Try Me.com/?ref=0x000...0000</div>
                        <button class="text-accent ml-2" id="copyReferral">
                            <i class="far fa-copy"></i>
                        </button>
                    </div>
                    <div class="text-sm text-gray-400">Earn 1% from direct referrals</div>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Referral Stats</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-300">Direct Referrals</span>
                            <span class="font-bold" id="directReferrals">0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Level 2 Referrals</span>
                            <span class="font-bold" id="level2Referrals">0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Referral Earnings</span>
                            <span class="font-bold text-primary" id="referralEarnings">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Make New Investment</h3>
                    <div class="mb-4">
                        <label class="block text-gray-300 mb-2">Amount (USDT)</label>
                        <input type="number" min="10" value="50"
                            class="w-full bg-gray-800 rounded-lg py-2 px-4">
                    </div>
                    <button class="w-full bg-accent hover:bg-opacity-80 py-2 rounded-lg font-medium transition">
                        Invest Now
                    </button>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Withdraw Earnings</h3>
                    <div class="mb-4">
                        <label class="block text-gray-300 mb-2">Amount (USDT)</label>
                        <input type="number" min="1" value="0"
                            class="w-full bg-gray-800 rounded-lg py-2 px-4" id="withdrawAmount">
                    </div>
                    <button class="w-full bg-success hover:bg-opacity-80 py-2 rounded-lg font-medium transition"
                        id="withdrawBtn">
                        Withdraw
                    </button>
                    <div class="text-xs text-gray-400 mt-2" id="nextWithdrawal">Next withdrawal available in 24h 0m 0s
                    </div>
                </div>
            </div>

            <div class="glass-card p-6 rounded-xl mb-8">
                <h3 class="text-lg font-bold mb-4">Transaction History</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-300 border-b border-gray-700">
                                <th class="py-2 text-left">Date</th>
                                <th class="py-2 text-left">Type</th>
                                <th class="py-2 text-left">Amount</th>
                                <th class="py-2 text-left">Status</th>
                                <th class="py-2 text-left">TX Hash</th>
                            </tr>
                        </thead>
                        <tbody id="transactionHistory">
                            <!-- Transactions will be added here dynamically -->
                        </tbody>
                    </table>
                </div>
                <div class="text-center text-gray-400 mt-4" id="noTransactions">No transactions yet</div>
            </div>
        </div>
    </div>

    <!-- Auth Modal -->
    <div id="auth-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-900 opacity-90" onclick="toggleAuthModal()"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold gradient-text" id="auth-modal-title">Login</h3>
                        <button onclick="toggleAuthModal()" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    {{-- login form --}}
                    <div id="login-form" class="space-y-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="login-username"
                                    class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                                {{-- <input type="text" id="login-username" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> --}}
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="username"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <label for="login-password"
                                    class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                                {{-- <input type="password" id="login-password" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> --}}
                                <x-text-input id="password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="password" name="password" required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center">
                                    <input id="remember-me" type="checkbox"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-600 rounded bg-gray-700">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-300">Remember
                                        me</label>
                                </div>
                                <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Forgot
                                    password?</a>
                            </div>
                            <button type="submit"
                                class="w-full bg-accent hover:bg-accent text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 mt-4">
                                Login
                            </button>

                            <div class="text-center text-sm text-gray-400 mt-4">
                                Don't have an account? <button onclick="toggleAuthForm('signup')"
                                    class="text-purple-400 hover:text-purple-300">Sign up</button>
                            </div>

                        </form>
                    </div>
                    {{-- signup form --}}
                    <div id="signup-form" class="space-y-4 hidden">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <label for="signup-username"
                                    class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                                {{-- <input type="text" id="signup-username"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <label for="signup-email" class="block text-sm font-medium text-gray-300 mb-1">Email
                                    Address</label>
                                {{-- <input type="email" id="signup-email"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                <x-text-input id="email"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    type="email" name="email" :value="old('email')" required
                                    autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <label for="signup-phone"
                                    class="block text-sm font-medium text-gray-300 mb-1">Phone</label>
                                {{-- <input type="text" id="signup-phone"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                <x-text-input id="phone" type="number" name="phone" :value="old('phone')" required
                                    autofocus autocomplete="name"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <label for="signup-password"
                                    class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                                {{-- <input type="password" id="signup-password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                <x-text-input id="password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    type="password" name="password" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div>
                                <label for="signup-confirm-password"
                                    class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                                {{-- <input type="password" id="signup-confirm-password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}

                                <x-text-input id="password_confirmation"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    type="password" name="password_confirmation" required
                                    autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div>
                                <label for="signup-referral"
                                    class="block text-sm font-medium text-gray-300 mb-1">Referral
                                    Code (Optional)</label>
                                <input type="text" id="signup-referral" name="referral_code" required
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div class="flex items-center mt-4">
                                <input id="terms" type="checkbox"
                                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-600 rounded bg-gray-700">
                                <label for="terms" class="ml-2 block text-sm text-gray-300">I agree to the <a0
                                        href="javascript:void(0);" class="text-purple-400 hover:text-purple-300">Terms
                                        & Conditions</a></label>
                            </div>
                            <button type="submit"
                                class="w-full bg-accent hover:bg-accent-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 mt-4">
                                Create Account
                            </button>
                            <div class="text-center text-sm text-gray-400 mt-4">
                                Already have an account? <button onclick="toggleAuthForm('login')"
                                    class="text-blue-400 hover:text-blue-300">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Social Icons Section -->
    <section class="bg-primary py-10">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-brown-700 mb-8">Follow Us</h2>
            <div class="flex justify-center flex-wrap gap-6">

                <!-- Social Icon Template -->
                <style>
                    .flip-card {
                        perspective: 1000px;
                    }

                    .flip-inner {
                        transition: transform 0.6s;
                        transform-style: preserve-3d;
                    }

                    .flip-card:hover .flip-inner {
                        transform: rotateY(180deg);
                    }

                    .flip-front,
                    .flip-back {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        backface-visibility: hidden;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 9999px;
                        border: 4px solid #8B4513;
                        /* brown border */
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
                        font-size: 2.5rem;
                    }

                    .flip-front {
                        background: white;
                        color: #8B4513;
                    }

                    .flip-back {
                        background: #8B4513;
                        color: white;
                        transform: rotateY(180deg);
                    }

                    .flip-card:hover .flip-front,
                    .flip-card:hover .flip-back {
                        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
                    }
                </style>

                <!-- Youtube -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="https://www.youtube.com/@TRYMENEWERA?sub_confirmation=1" target="_blank"
                            class="flip-front">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.youtube.com/@TRYMENEWERA?sub_confirmation=1" target="_blank"
                            class="flip-back">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Twitter -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="https://x.com/TRYMENEWERA" target="_blank" class="flip-front">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://x.com/TRYMENEWERA" target="_blank" class="flip-back">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Instagram -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="https://www.instagram.com/trymenewera/" target="_blank" class="flip-front">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.instagram.com/trymenewera/" target="_blank" class="flip-back">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- TikTok -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="https://www.tiktok.com/@trymeofficial_" target="_blank" class="flip-front">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.tiktok.com/@trymeofficial_" target="_blank" class="flip-back">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="mailto:tryme@gmail.com" class="flip-front">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="mailto:tryme@gmail.com" class="flip-back">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <!-- Website -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="{{ url('/') }}" target="_blank" class="flip-front">
                            <i class="fas fa-globe"></i>
                        </a>
                        <a href="{{ url('/') }}" target="_blank" class="flip-back">
                            <i class="fas fa-globe"></i>
                        </a>
                    </div>
                </div>

                <!-- Call -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="tel:+01234567890" class="flip-front">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <a href="tel:+01234567890" class="flip-back">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="flip-card w-[120px] h-[120px] relative">
                    <div class="flip-inner w-full h-full">
                        <a href="https://wa.me/01234567890" target="_blank" class="flip-front">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://wa.me/01234567890" target="_blank" class="flip-back">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>






    <!-- Footer -->
    <footer class="bg-darker py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Logo & Description -->
                <div>


                    <div class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-20 h-auto">
                    </div>
                    <p class="text-gray-300">
                        Earn 4 to 10% Daily From Real Trading Profits Join our sustainable investment platform powered
                        by
                        professional crypto and forex trading strategies.
                    </p>

                    <!-- Social Icons -->
                    {{-- <div class="flex space-x-4 mt-4">
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://t.me" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer"
                            class="text-gray-400 hover:text-accent transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div> --}}

                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Referral</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">How It Works</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Terms of Service</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Privacy Policy</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Risk Disclosure</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-envelope mr-2"></i> support@tryme.com
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fab fa-telegram mr-2"></i> @TryMesupport
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Try Me. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert("Copied to clipboard!");
            }).catch(err => {
                console.error("Failed to copy text: ", err);
            });
        }


        // Attach click to all package buttons
        document.querySelectorAll('.package-btn').forEach(btn => {
            btn.addEventListener('click', () => toggleAuthModal('signup'));
        });
    </script>



    {{-- Faq Scritp --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const faqItems = document.querySelectorAll(".faq-item");

            faqItems.forEach((item, index) => {
                const question = item.querySelector(".faq-question");
                const answer = item.querySelector(".faq-answer");

                // First item open by default
                if (index !== 0) {
                    answer.classList.add("hidden");
                }

                question.addEventListener("click", () => {
                    // Close all
                    faqItems.forEach(f => f.querySelector(".faq-answer").classList.add("hidden"));
                    // Open clicked
                    answer.classList.remove("hidden");
                });
            });
        });
    </script>

    {{-- Faq script end --}}


    <script>
        // Auth modal functions
        function toggleAuthModal(type = null) {
            const modal = document.getElementById('auth-modal');
            modal.classList.toggle('hidden');

            if (type === 'login') {
                toggleAuthForm('login');
            } else if (type === 'signup') {
                toggleAuthForm('signup');
            }
        }

        function toggleAuthForm(type) {
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');
            const modalTitle = document.getElementById('auth-modal-title');

            if (type === 'login') {
                loginForm.classList.remove('hidden');
                signupForm.classList.add('hidden');
                modalTitle.textContent = 'Login';
            } else {
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                modalTitle.textContent = 'Sign Up';
            }
        }

        // Deposit modal
        function toggleDepositModal() {
            const modal = document.getElementById('deposit-modal');
            modal.classList.toggle('hidden');
        }

        // Withdraw success modal
        function toggleWithdrawSuccessModal() {
            const modal = document.getElementById('withdraw-success-modal');
            modal.classList.toggle('hidden');
        }


        // Simulated user data
        const userData = {
            walletAddress: '0x742d35Cc6634C0532925a3b844Bc454e4438f44e',
            totalInvested: 0,
            availableToWithdraw: 0,
            totalEarned: 0,
            directReferrals: 0,
            level2Referrals: 0,
            referralEarnings: 0,
            lastWithdrawal: null,
            transactions: []
        };

        // DOM Elements
        const connectWalletBtn = document.getElementById('connectWalletBtn');
        const investNowBtn = document.getElementById('investNowBtn');
        const walletModal = document.getElementById('walletModal');
        const closeWalletModal = document.getElementById('closeWalletModal');
        const investmentModal = document.getElementById('investmentModal');
        const closeInvestmentModal = document.getElementById('closeInvestmentModal');
        const dashboard = document.getElementById('dashboard');
        const closeDashboard = document.getElementById('closeDashboard');
        const disconnectWallet = document.getElementById('disconnectWallet');
        const walletAddress = document.getElementById('walletAddress');
        const referralLink = document.getElementById('referralLink');
        const copyAddress = document.getElementById('copyAddress');
        const copyReferral = document.getElementById('copyReferral');
        const totalInvested = document.getElementById('totalInvested');
        const availableToWithdraw = document.getElementById('availableToWithdraw');
        const totalEarned = document.getElementById('totalEarned');
        const directReferrals = document.getElementById('directReferrals');
        const level2Referrals = document.getElementById('level2Referrals');
        const referralEarnings = document.getElementById('referralEarnings');
        const withdrawBtn = document.getElementById('withdrawBtn');
        const withdrawAmount = document.getElementById('withdrawAmount');
        const nextWithdrawal = document.getElementById('nextWithdrawal');
        const transactionHistory = document.getElementById('transactionHistory');
        const noTransactions = document.getElementById('noTransactions');
        const investmentAmount = document.getElementById('investmentAmount');
        const currentAmount = document.getElementById('currentAmount');
        const investmentPeriod = document.getElementById('investmentPeriod');
        const currentPeriod = document.getElementById('currentPeriod');
        const referralCount = document.getElementById('referralCount');
        const currentReferrals = document.getElementById('currentReferrals');
        const dailyRoi = document.getElementById('dailyRoi');
        const totalRoi = document.getElementById('totalRoi');
        const referralIncome = document.getElementById('referralIncome');
        const totalEarnings = document.getElementById('totalEarnings');

        // Event Listeners
        connectWalletBtn.addEventListener('click', () => {
            walletModal.classList.remove('hidden');
        });

        closeWalletModal.addEventListener('click', () => {
            walletModal.classList.add('hidden');
        });

        investNowBtn.addEventListener('click', () => {
            if (userData.walletAddress) {
                investmentModal.classList.remove('hidden');
            } else {
                walletModal.classList.remove('hidden');
            }
        });

        closeInvestmentModal.addEventListener('click', () => {
            investmentModal.classList.add('hidden');
        });

        // Simulate wallet connection
        document.querySelectorAll('#walletModal button').forEach(btn => {
            btn.addEventListener('click', () => {
                walletModal.classList.add('hidden');
                connectWalletBtn.innerHTML =
                    `<i class="fas fa-wallet mr-2"></i> ${userData.walletAddress.substring(0, 6)}...${userData.walletAddress.substring(38)}`;
                connectWalletBtn.classList.add('bg-primary', 'hover:bg-opacity-80');
                connectWalletBtn.classList.remove('bg-accent');

                // Update dashboard data
                updateDashboard();

                // Show dashboard
                dashboard.classList.remove('hidden');
            });
        });

        closeDashboard.addEventListener('click', () => {
            dashboard.classList.add('hidden');
        });

        disconnectWallet.addEventListener('click', () => {
            connectWalletBtn.innerHTML = 'Connect Wallet';
            connectWalletBtn.classList.remove('bg-primary', 'hover:bg-opacity-80');
            connectWalletBtn.classList.add('bg-accent');
            dashboard.classList.add('hidden');
        });

        copyAddress.addEventListener('click', () => {
            navigator.clipboard.writeText(userData.walletAddress);
            alert('Wallet address copied to clipboard!');
        });

        copyReferral.addEventListener('click', () => {
            navigator.clipboard.writeText(`https:// Try Me.com/?ref=${userData.walletAddress}`);
            alert('Referral link copied to clipboard!');
        });

        withdrawBtn.addEventListener('click', () => {
            const amount = parseFloat(withdrawAmount.value);
            if (isNaN(amount) || amount < 1) {
                alert('Minimum withdrawal amount is $1');
                return;
            }

            if (amount > userData.availableToWithdraw) {
                alert(`You can only withdraw up to $${userData.availableToWithdraw.toFixed(2)}`);
                return;
            }

            // Check if 24 hours have passed since last withdrawal
            if (userData.lastWithdrawal) {
                const now = new Date();
                const lastWithdrawalTime = new Date(userData.lastWithdrawal);
                const hoursSinceLastWithdrawal = (now - lastWithdrawalTime) / (1000 * 60 * 60);

                if (hoursSinceLastWithdrawal < 24) {
                    alert(
                        `You can only withdraw once every 24 hours. Next withdrawal available in ${Math.floor(24 - hoursSinceLastWithdrawal)} hours.`
                    );
                    return;
                }
            }

            // Process withdrawal
            userData.totalEarned += amount;
            userData.availableToWithdraw -= amount;
            userData.lastWithdrawal = new Date().toISOString();

            // Add transaction
            userData.transactions.unshift({
                date: new Date().toLocaleString(),
                type: 'Withdrawal',
                amount: amount.toFixed(2),
                status: 'Completed',
                txHash: '0x' + Math.random().toString(16).substr(2, 64)
            });

            updateDashboard();
            alert(`Successfully withdrew $${amount.toFixed(2)}`);
        });

        // Investment calculator logic
        // investmentAmount.addEventListener('input', updateCalculator);
        // investmentPeriod.addEventListener('input', updateCalculator);
        // referralCount.addEventListener('input', updateCalculator);

        // function updateCalculator() {
        //     const amount = parseFloat(investmentAmount.value);
        //     const period = parseInt(investmentPeriod.value);
        //     const referrals = parseInt(referralCount.value);

        //     currentAmount.textContent = `$${amount}`;
        //     currentPeriod.textContent = `${period} days`;
        //     currentReferrals.textContent = referrals;

        //     const daily = amount * 0.02;
        //     const total = daily * period;
        //     const refIncome = amount * referrals * 0.01;
        //     const totalEarn = total + refIncome;

        //     dailyRoi.textContent = `$${daily.toFixed(2)}`;
        //     totalRoi.textContent = `$${total.toFixed(2)}`;
        //     referralIncome.textContent = `$${refIncome.toFixed(2)}`;
        //     totalEarnings.textContent = `$${totalEarn.toFixed(2)}`;
        // }
        // updateCalculator();



        // Update dashboard data
        function updateDashboard() {
            walletAddress.textContent =
                `${userData.walletAddress.substring(0, 6)}...${userData.walletAddress.substring(38)}`;
            referralLink.textContent = `https:// Try Me.com/?ref=${userData.walletAddress}`;
            totalInvested.textContent = `$${userData.totalInvested.toFixed(2)}`;
            availableToWithdraw.textContent = `$${userData.availableToWithdraw.toFixed(2)}`;
            totalEarned.textContent = `$${userData.totalEarned.toFixed(2)}`;
            directReferrals.textContent = userData.directReferrals;
            level2Referrals.textContent = userData.level2Referrals;
            referralEarnings.textContent = `$${userData.referralEarnings.toFixed(2)}`;

            // Update withdraw button state
            if (userData.availableToWithdraw >= 1) {
                withdrawBtn.disabled = false;
                withdrawBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                withdrawBtn.disabled = true;
                withdrawBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }

            // Update next withdrawal time
            if (userData.lastWithdrawal) {
                const now = new Date();
                const lastWithdrawalTime = new Date(userData.lastWithdrawal);
                const nextWithdrawalTime = new Date(lastWithdrawalTime.getTime() + 24 * 60 * 60 * 1000);

                if (now < nextWithdrawalTime) {
                    const diff = nextWithdrawalTime - now;
                    const hours = Math.floor(diff / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    nextWithdrawal.textContent = `Next withdrawal available in ${hours}h ${minutes}m ${seconds}s`;
                } else {
                    nextWithdrawal.textContent = 'Ready to withdraw';
                }
            } else {
                nextWithdrawal.textContent = 'Ready to withdraw';
            }

            // Update transaction history
            if (userData.transactions.length > 0) {
                noTransactions.classList.add('hidden');
                transactionHistory.innerHTML = '';

                userData.transactions.forEach(tx => {
                    const row = document.createElement('tr');
                    row.className = 'border-b border-gray-700';
                    row.innerHTML = `
                        <td class="py-3">${tx.date}</td>
                        <td class="py-3">${tx.type}</td>
                        <td class="py-3">$${tx.amount}</td>
                        <td class="py-3">${tx.status}</td>
                        <td class="py-3 text-accent">${tx.txHash.substring(0, 10)}...</td>
                    `;
                    transactionHistory.appendChild(row);
                });
            } else {
                noTransactions.classList.remove('hidden');
            }
        }

        // Simulate investment
        document.querySelector('#investmentModal button').addEventListener('click', () => {
            const amount = 100; // Default investment amount for demo
            userData.totalInvested += amount;
            userData.availableToWithdraw += amount * 0.02; // First day ROI

            // Add transaction
            userData.transactions.unshift({
                date: new Date().toLocaleString(),
                type: 'Investment',
                amount: amount.toFixed(2),
                status: 'Completed',
                txHash: '0x' + Math.random().toString(16).substr(2, 64)
            });

            investmentModal.classList.add('hidden');
            updateDashboard();
            alert(`Successfully invested $${amount.toFixed(2)}`);

            // Simulate daily ROI
            setInterval(() => {
                if (userData.totalInvested > 0) {
                    const roi = userData.totalInvested * 0.02;
                    userData.availableToWithdraw += roi;
                    updateDashboard();
                }
            }, 10000); // Update every 10 seconds for demo purposes
        });

        // Simulate referral earnings
        setTimeout(() => {
            userData.directReferrals = 3;
            userData.level2Referrals = 7;
            userData.referralEarnings = 15.50;
            updateDashboard();
        }, 3000);
    </script>

    <script>
        //  Calculator Start

        // Helper: format currency
        function formatCurrency(val) {
            return '$' + Number(val).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Elements
        const investmentEl = document.getElementById('investmentAmount');
        const poolRangeEl = document.getElementById('poolRange');
        const poolPercentDisplay = document.getElementById('poolPercentDisplay');
        const poolRangeLabel = document.getElementById('poolRangeLabel');
        const dailyROIEl = document.getElementById('dailyROI');
        const totalROIEl = document.getElementById('totalROI');
        const totalReturnEl = document.getElementById('totalReturn');

        // Get selected pool %
        function getSelectedPoolPercent() {
            const opt = poolRangeEl.selectedOptions[0];
            const pct = parseFloat(opt.dataset.percent);
            return isFinite(pct) ? pct : 0;
        }

        // Update pool info
        function updatePoolDisplay() {
            const opt = poolRangeEl.selectedOptions[0];
            poolRangeLabel.textContent = opt.value;
            const pct = getSelectedPoolPercent();
            poolPercentDisplay.textContent = 'Daily Profit: ' + pct + '%';
        }

        // Calculate ROI
        function calculateROI() {
            const investment = parseFloat(investmentEl.value) || 0;
            const percent = getSelectedPoolPercent();
            const dailyROI = (investment * percent) / 100;
            const totalROI = dailyROI * 40;
            const totalReturn = totalROI; // ✅ ROI only
            const totalPercent = (totalROI / (investment || 1)) * 100;

            dailyROIEl.textContent = formatCurrency(dailyROI);
            totalROIEl.textContent = formatCurrency(totalROI);
            totalReturnEl.textContent = formatCurrency(totalReturn) + ' (' + totalPercent.toFixed(0) + '%)';
        }

        // Events
        investmentEl.addEventListener('change', calculateROI);
        investmentEl.addEventListener('input', calculateROI);
        poolRangeEl.addEventListener('change', () => {
            updatePoolDisplay();
            calculateROI();
        });
        document.getElementById('investBtn').addEventListener('click', (e) => {
            e.preventDefault();
            calculateROI();
            alert('Calculation updated — check the results above.');
        });

        // Init
        updatePoolDisplay();
        calculateROI();

        //  Calculator End

        // ROI Calculator
        // const investmentInput = document.getElementById('investment-amount');
        // const dailyRoiDisplay = document.getElementById('daily-roi');
        // const totalRoiDisplay = document.getElementById('total-roi');
        // const totalReturnDisplay = document.getElementById('total-return');

        // investmentInput.addEventListener('input', updateRoiCalculation);

        // function updateRoiCalculation() {
        //     const amount = parseFloat(investmentInput.value) || 25;
        //     const dailyRoi = amount * 0.04;
        //     const totalRoi = dailyRoi * 40;

        //     dailyRoiDisplay.textContent = '$' + dailyRoi.toFixed(2);
        //     totalRoiDisplay.textContent = '$' + totalRoi.toFixed(2);
        //     totalReturnDisplay.textContent = '$' + totalRoi.toFixed(2) + ' (160%)';
        // }

        // Initialize calculator
        // updateRoiCalculation();

        // FAQ Toggle
        function toggleFAQ(num) {
            const content = document.getElementById('faq-content-' + num);
            const icon = document.getElementById('faq-icon-' + num);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('transform', 'rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('transform', 'rotate-180');
            }
        }

        // Simulate package progress animation
        setTimeout(() => {
            const progressBar = document.querySelector('.progress-bar');
            progressBar.style.width = '100%';
        }, 500);
    </script>


</body>

</html>
