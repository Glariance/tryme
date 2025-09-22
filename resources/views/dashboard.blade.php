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
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        }


        .spinner {
            width: 300px;
            height: 300px;
            position: relative;
            margin: 0 auto;
        }

        .spinner-wheel {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 50%;
            overflow: hidden;
            border: 8px solid #0f172a;
            box-shadow:
                0 0 0 8px #6d28d9,
                0 0 30px rgba(109, 40, 217, 0.8),
                0 0 60px rgba(59, 130, 246, 0.7),
                0 0 100px rgba(56, 189, 248, 0.5);
            transition: transform 4s cubic-bezier(0.17, 0.67, 0.12, 0.99);
            transform: rotate(0deg);
        }

        .spinner-item {
            position: absolute;
            width: 50%;
            height: 50%;
            top: 50%;
            left: 50%;
            transform-origin: 0% 0%;
            transform: rotate(var(--rotate));
            clip-path: polygon(0 0, 100% 0, 100% 100%);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 25px;
            font-weight: bold;
            font-size: 1.2rem;
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8),
                0 0 20px rgba(255, 255, 255, 0.6);
        }

        /* 🎨 Multicolor gradient segments */
        .spinner-item:nth-child(1) {
            background: linear-gradient(135deg, #ff4d4d, #ff9900);
        }

        .spinner-item:nth-child(2) {
            background: linear-gradient(135deg, #ff9900, #ffee00);
        }

        .spinner-item:nth-child(3) {
            background: linear-gradient(135deg, #ffee00, #33cc33);
        }

        .spinner-item:nth-child(4) {
            background: linear-gradient(135deg, #33cc33, #0099ff);
        }

        .spinner-item:nth-child(5) {
            background: linear-gradient(135deg, #0099ff, #6633cc);
        }

        .spinner-item:nth-child(6) {
            background: linear-gradient(135deg, #6633cc, #cc33ff);
        }

        .spinner-item:nth-child(7) {
            background: linear-gradient(135deg, #cc33ff, #ff3399);
        }

        .spinner-item:nth-child(8) {
            background: linear-gradient(135deg, #ff3399, #ff4d4d);
        }

        .spinner-item span {
            transform: rotate(calc(-1 * var(--rotate)));
        }

        .spinner-arrow {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            color: #38bdf8;
            font-size: 40px;
            z-index: 10;
            text-shadow: 0 0 15px rgba(56, 189, 248, 0.9),
                0 0 25px rgba(59, 130, 246, 0.8);
        }

        .spinner-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6d28d9, #3b82f6);
            color: #fff;
            border: none;
            font-weight: bold;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 0 15px rgba(109, 40, 217, 0.9),
                0 0 30px rgba(59, 130, 246, 0.8);
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .spinner-button:hover {
            transform: translate(-50%, -50%) scale(1.08);
            box-shadow: 0 0 25px rgba(109, 40, 217, 1),
                0 0 40px rgba(59, 130, 246, 0.9);
        }
    </style>



</head>







<body class="gradient-bg text-white min-h-screen font-sans">





    <div class="container mx-auto px-4 py-8">



        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-20 h-auto">
            </div>
            <div class="flex items-center space-x-4">

                <span class="flex items-center text-gray-400 hover:text-white">
                    <i class="fas fa-user mr-2"></i> Welcome {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                {{-- <button id="closeDashboard" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button> --}}
            </div>
        </div>


        <h1 id="winner-heading"
            style="
        margin: 20px 0;
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: #FFD700;
        text-shadow: 0 0 8px rgba(255, 215, 0, 0.8), 0 0 16px rgba(255, 215, 0, 0.6);
        background: linear-gradient(90deg, #FFD700, #FFA500, #FFD700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    ">
            Congratulations! You won $0 signup bonus!
        </h1>


        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Invested -->
            <div class="rounded-xl p-6 transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            border: 2px solid #a0522d;
            box-shadow: 0 0 15px 3px rgba(160, 82, 45, 0.35);">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm mb-1 font-medium" style="color: #a0522d;">Total Invested</div>
                        <div class="text-2xl font-bold" id="user-invested" style="color: #a0522d;">$0.00</div>
                    </div>
                    <div class="text-3xl" style="color: #a0522d;">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>



            <!-- ROI Balance -->
            <div class="rounded-xl p-6 transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border: 2px solid #22c55e;
               box-shadow: 0 0 15px 3px rgba(34, 197, 94, 0.35);">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-green-400 text-sm mb-1 font-medium">ROI Balance</div>
                        <div class="text-2xl font-bold text-green-400" id="user-roi">$0.00</div>
                    </div>
                    <div class="text-green-400 text-3xl">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
            </div>

            <!-- Referral Earnings -->
            <div class="rounded-xl p-6 transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border: 2px solid #a855f7;
               box-shadow: 0 0 15px 3px rgba(168, 85, 247, 0.35);">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-purple-400 text-sm mb-1 font-medium">Referral Earnings</div>
                        <div class="text-2xl font-bold text-purple-400" id="user-referral">$0.00</div>
                    </div>
                    <div class="text-purple-400 text-3xl">
                        <i class="fas fa-user-friends"></i>
                    </div>
                </div>
            </div>

            <!-- Available to Withdraw -->
            <div class="rounded-xl p-6 transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border: 2px solid #facc15;
               box-shadow: 0 0 15px 3px rgba(250, 204, 21, 0.35);">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-yellow-400 text-sm mb-1 font-medium">Available to Withdraw</div>
                        <div class="text-2xl font-bold text-yellow-400" id="user-withdrawable">$0.00</div>
                    </div>
                    <div class="text-yellow-400 text-3xl">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
        </div>



        {{-- Deposid section --}}
        <div id="invest" class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Deposit Addresses -->
            <div class="dashboard-card rounded-xl p-6 shadow-lg transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border: 2px solid #4f8ef7;
               box-shadow: 0 0 20px rgba(79, 142, 247, 0.6);">
                <h2 class="text-xl font-bold mb-4 flex items-center text-blue-400">
                    <i class="fas fa-qrcode mr-2"></i> Your Deposit Addresses
                </h2>
                <div class="space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-blue-300">USDT TRC20</span>
                            <button onclick="copyToClipboard('trc20-address')"
                                class="text-blue-400 hover:text-blue-300 text-sm">
                                <i class="fas fa-copy mr-1"></i> Copy
                            </button>
                        </div>
                        <div class="p-3 rounded-lg" style="background-color: #121627;">
                            <code class="wallet-address text-sm text-blue-200"
                                id="trc20-address">0x000000000000000000000000000000000</code>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-blue-300">USDT BEP20</span>
                            <button onclick="copyToClipboard('bep20-address')"
                                class="text-blue-400 hover:text-blue-300 text-sm">
                                <i class="fas fa-copy mr-1"></i> Copy
                            </button>
                        </div>
                        <div class="p-3 rounded-lg" style="background-color: #121627;">
                            <code class="wallet-address text-sm text-blue-200"
                                id="bep20-address">0x000000000000000000000000000000000</code>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button onclick="toggleDepositModal()"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                            <i class="fas fa-info-circle mr-2"></i> Deposit Instructions
                        </button>
                    </div>
                </div>
            </div>

            <!-- Referral Link -->
            <div class="dashboard-card rounded-xl p-6 shadow-lg transition"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border: 2px solid #9b59b6;
               box-shadow: 0 0 20px rgba(155, 89, 182, 0.6);">
                <h2 class="text-xl font-bold mb-4 flex items-center text-purple-400">
                    <i class="fas fa-user-plus mr-2"></i> Your Referral Link
                </h2>

                @php
                    $referralLink = url('/') . '?ref=' . str_replace(' ', '', Auth::user()->name);
                @endphp

                <div class="space-y-4">
                    <div class="p-3 rounded-lg" style="background-color: #121627;">
                        <code class="wallet-address text-sm text-purple-200" id="referral-link">
                            {{ $referralLink }}
                        </code>
                    </div>
                    <div class="flex justify-between gap-4">
                        <button onclick="copyToClipboard('referral-link-text')"
                            class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                            <i class="fas fa-copy mr-2"></i> Copy Link
                        </button>
                        <p class="hidden" id="referral-link-text">{{ $referralLink }}</p>
                        <button onclick="shareReferralLink('{{ $referralLink }}')"
                            class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                            <i class="fas fa-share-alt mr-2"></i> Share
                        </button>
                    </div>
                    <div class="flex justify-center mt-4">
                        <div id="qr-code" class="w-32 h-32 rounded-lg flex items-center justify-center"
                            style="background-color: #121627;">
                        </div>
                    </div>
                    <div class="text-center text-sm text-purple-400 mt-2">
                        Scan QR code to share your referral
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
            </div>
        </div>


        <div class="grid md:grid-cols-3 gap-6 mb-8">
            {{-- BTC Widget --}}
            <div class="rounded-xl p-4 shadow-sm"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
              border: 2px solid #4f8ef7;
              box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <div class="tradingview-widget-container"
                    style="width: 100%; height: 220px; background: #121627; border-radius: 12px; overflow: hidden;">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://www.tradingview-widget.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22BINANCE%3ABTCUSDT%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A220%2C%22dateRange%22%3A%2212M%22%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22autosize%22%3Atrue%2C%22utm_source%22%3A%22%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%2C%22page-uri%22%3A%22__NHTTP__%22%7D"
                        title="mini symbol-overview TradingView widget" lang="en"
                        style="user-select: none; box-sizing: border-box; display: block; height: 100%; width: 100%; border-radius: 12px;"></iframe>
                </div>
            </div>

            {{-- ETH Widget --}}
            <div class="rounded-xl p-4 shadow-sm"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
              border: 2px solid #4f8ef7;
              box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <div class="tradingview-widget-container"
                    style="width: 100%; height: 220px; background: #121627; border-radius: 12px; overflow: hidden;">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://www.tradingview-widget.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22BINANCE%3AETHUSDT%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A220%2C%22dateRange%22%3A%2212M%22%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22autosize%22%3Atrue%2C%22utm_source%22%3A%22%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%2C%22page-uri%22%3A%22__NHTTP__%22%7D"
                        title="mini symbol-overview TradingView widget" lang="en"
                        style="user-select: none; box-sizing: border-box; display: block; height: 100%; width: 100%; border-radius: 12px;"></iframe>
                </div>
            </div>

            {{-- SOL Widget --}}
            <div class="rounded-xl p-4 shadow-sm"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
              border: 2px solid #4f8ef7;
              box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <div class="tradingview-widget-container"
                    style="width: 100%; height: 220px; background: #121627; border-radius: 12px; overflow: hidden;">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://www.tradingview-widget.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22BINANCE%3ASOLUSDT%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A220%2C%22dateRange%22%3A%2212M%22%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22autosize%22%3Atrue%2C%22utm_source%22%3A%22%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%2C%22page-uri%22%3A%22__NHTTP__%22%7D"
                        title="mini symbol-overview TradingView widget" lang="en"
                        style="user-select: none; box-sizing: border-box; display: block; height: 100%; width: 100%; border-radius: 12px;"></iframe>
                </div>
            </div>
        </div>



        <div class="grid md:grid-cols-3 gap-6 mb-8">
            {{-- DOGE Widget --}}
            <div class="rounded-xl p-4 shadow-sm"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        border: 2px solid #4f8ef7;
        box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <div class="tradingview-widget-container"
                    style="width: 100%; height: 220px; background: #121627; border-radius: 12px; overflow: hidden;">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://www.tradingview-widget.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22BINANCE%3ADOGEUSDT%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A220%2C%22dateRange%22%3A%2212M%22%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22autosize%22%3Atrue%2C%22utm_source%22%3A%22%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%2C%22page-uri%22%3A%22__NHTTP__%22%7D"
                        title="mini symbol-overview TradingView widget" lang="en"
                        style="user-select: none; box-sizing: border-box; display: block; height: 100%; width: 100%; border-radius: 12px;"></iframe>
                </div>
            </div>

            {{-- Gold Widget --}}
            <div class="rounded-xl p-4 shadow-sm"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        border: 2px solid #4f8ef7;
        box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <div class="tradingview-widget-container"
                    style="width: 100%; height: 220px; background: #121627; border-radius: 12px; overflow: hidden;">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://www.tradingview-widget.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22OANDA%3AXAUUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A220%2C%22dateRange%22%3A%2212M%22%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22autosize%22%3Atrue%7D"
                        title="Gold Market Chart" lang="en"
                        style="user-select: none; box-sizing: border-box; display: block; height: 100%; width: 100%; border-radius: 12px;"></iframe>
                </div>
            </div>

            {{-- Referral Stats --}}
            <div class="p-6 rounded-xl"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        border: 2px solid #4f8ef7;
        box-shadow: 0 4px 20px rgba(79, 142, 247, 0.3);">
                <h3 class="text-lg font-bold mb-4 text-blue-400">Referral Stats</h3>
                <div class="space-y-3 text-blue-200">
                    <div class="flex justify-between">
                        <span>Direct Referrals</span>
                        <span class="font-bold">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Referral Earnings</span>
                        <span class="font-bold text-blue-400" id="referralEarnings">$0.00</span>
                    </div>
                </div>
            </div>

        </div>




        {{--
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="p-6 rounded-xl"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); border: 2px solid #4f8ef7; box-shadow: 0 4px 20px rgba(79, 142, 247, 0.3);">
                <h3 class="text-lg font-bold mb-4 text-blue-400">Wallet Address</h3>
                <div class="flex items-center bg-[#121627] rounded-lg p-3 mb-4">
                    <div class="truncate flex-1 text-blue-200" id="walletAddress">0x000...0000</div>
                    <button class="text-blue-400 ml-2" id="copyAddress" aria-label="Copy wallet address">
                        <i class="far fa-copy"></i>
                    </button>
                </div>
                <div class="text-sm text-blue-300">Connected with MetaMask</div>
            </div>

            <div class="p-6 rounded-xl"
                    style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); border: 2px solid #4f8ef7; box-shadow: 0 4px 20px rgba(79, 142, 247, 0.3);">
                    <h3 class="text-lg font-bold mb-4 text-blue-400">Referral Link</h3>
                    <div class="flex items-center bg-[#121627] rounded-lg p-3 mb-4">
                        <div class="truncate flex-1 text-blue-200" id="referralLink">https:// Try
                            Me.com/?ref=0x000...0000</div>
                        <button class="text-blue-400 ml-2" id="copyReferral" aria-label="Copy referral link">
                            <i class="far fa-copy"></i>
                        </button>
                    </div>
                    <div class="text-sm text-blue-300">Earn 1% from direct referrals</div>
                </div>

                <div class="p-6 rounded-xl"
                    style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); border: 2px solid #4f8ef7; box-shadow: 0 4px 20px rgba(79, 142, 247, 0.3);">
                    <h3 class="text-lg font-bold mb-4 text-blue-400">Referral Stats</h3>
                    <div class="space-y-3 text-blue-200">
                        <div class="flex justify-between">
                            <span>Direct Referrals</span>
                            <span class="font-bold" id="directReferrals">0</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Level 2 Referrals</span>
                            <span class="font-bold" id="level2Referrals">0</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Referral Earnings</span>
                            <span class="font-bold text-blue-400" id="referralEarnings">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
            --}}


        <!-- Economic News Impact Section -->
        <section class="w-full py-12 px-0 text-gray-200">
            <!-- Heading -->
            <div id="news-impact" class="rounded-none p-6 md:p-12"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
               border-top: 3px solid #a855f7;
               border-bottom: 3px solid #a855f7;
               box-shadow: 0 0 25px 6px rgba(168, 85, 247, 0.45);">

                <div class="md:flex items-stretch max-w-7xl mx-auto">
                    <!-- Left Text Content -->
                    <div class="md:w-1/2 p-8 md:p-12 text-white">
                        <h3 class="text-3xl font-bold mb-6 flex items-center">
                            <i class="fas fa-newspaper mr-2" style="color:#a855f7;"></i>
                            How Daily Global News Impacts Trading
                        </h3>

                        <p class="text-gray-300 mb-6 leading-relaxed">
                            In financial markets, <span style="color:#a855f7;" class="font-semibold">news is
                                power</span>.
                            Major economic events such as <span class="text-white">interest rate decisions</span>,
                            <span class="text-white">inflation reports</span>,
                            <span class="text-white">employment data</span>,
                            or <span class="text-white">geopolitical developments</span> significantly affect market
                            volatility.
                            For traders in <strong style="color:#a855f7;">crypto, forex, commodities, or
                                indices</strong>,
                            even a single press release can shift market sentiment instantly.
                        </p>

                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Every day, traders monitor global news to assess how events might affect price movements.
                            For example:
                        </p>

                        <ul class="list-disc list-inside text-gray-300 mb-6 space-y-2">
                            <li><strong class="text-white">Interest Rate Hikes</strong> from central banks usually
                                strengthen the local currency.</li>
                            <li><strong class="text-white">High Unemployment Data</strong> can weaken market
                                confidence.</li>
                            <li><strong class="text-white">Crypto regulation announcements</strong> can cause sudden
                                spikes or crashes in Bitcoin and altcoins.</li>
                        </ul>

                        <p class="text-gray-300 leading-relaxed">
                            That's why it's essential to stay updated with day-to-day economic events.
                            Below is a live calendar showing <strong style="color:#a855f7;">real-time global
                                news</strong>
                            that directly influences trading activity.
                        </p>
                    </div>

                    <!-- Right Widget (same height as left) -->
                    <div class="md:w-1/2 p-6 flex">
                        <div class="rounded-lg w-full flex flex-col"
                            style="background: #0d1117;
                           border: 2px solid #a855f7;
                           box-shadow: 0 0 20px 5px rgba(168, 85, 247, 0.45);">

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



        {{-- Your Referral Network --}}
        <div id="referrals" class="dashboard-card rounded-xl p-6 mb-12"
            style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                border: 2px solid #4f8ef7;
                box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
            <h2 class="text-xl font-bold mb-6 flex items-center text-white">
                <i class="fas fa-users mr-2 text-green-400"></i> Your Referral Network
            </h2>

            <p class="flex justify-center">Empty...</p>

            {{-- <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">
                                Level</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">
                                Referrals</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">
                                Total Investment</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">
                                Your Earnings</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-900 text-blue-100">Level
                                    1</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-200" id="level1-count">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-200" id="level1-invested">
                                $500.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-400"
                                id="level1-earnings">$5.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-900 text-purple-100">Level
                                    2</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-200" id="level2-count">7
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-200" id="level2-invested">
                                $1,200.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-400"
                                id="level2-earnings">$6.00</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}


            <div class="mt-6">
                <h3 class="text-lg font-medium mb-3 text-white">Recent Referral Activity</h3>
                {{-- <div class="space-y-3">
                    <div class="flex items-center justify-between p-3"
                        style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                  border: 1px solid #4f8ef7;
                  box-shadow: 0 0 10px 1px rgba(79, 142, 247, 0.25);
                  border-radius: 12px;">
                        <div class="flex items-center">
                            <div
                                class="bg-blue-900 text-blue-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                <i class="fas fa-user-plus text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-blue-200">New referral: crypto_lover</div>
                                <div class="text-xs text-blue-400">2 hours ago</div>
                            </div>
                        </div>
                        <div class="text-sm text-green-400">+$5.00</div>
                    </div>
                    <div class="flex items-center justify-between p-3"
                        style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                  border: 1px solid #7f5ae2;
                  box-shadow: 0 0 10px 1px rgba(127, 90, 226, 0.25);
                  border-radius: 12px;">
                        <div class="flex items-center">
                            <div
                                class="bg-purple-900 text-purple-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                <i class="fas fa-coins text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-purple-200">Referral deposit: $500</div>
                                <div class="text-xs text-purple-400">1 day ago</div>
                            </div>
                        </div>
                        <div class="text-sm text-green-400">+$2.50</div>
                    </div>
                </div> --}}
                <p class="flex justify-center">Empty...</p>

            </div>
        </div>

        {{-- Transaction History --}}
        <div id="transactions" class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="rounded-xl p-6"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
              border: 2px solid #4f8ef7;
              box-shadow: 0 0 15px 3px rgba(79, 142, 247, 0.35);">
                <h2 class="text-xl font-bold mb-6 flex items-center text-white">
                    <i class="fas fa-exchange-alt mr-2 text-yellow-400"></i> Transaction History
                </h2>
                {{-- <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 rounded-lg"
                        style="background: #121627; border: 1px solid #2f3a66; box-shadow: 0 0 10px rgba(79, 142, 247, 0.2);">
                        <div class="flex items-center">
                            <div
                                class="bg-green-900 text-green-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                <i class="fas fa-arrow-down text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-green-200">Deposit: $100 USDT (TRC20)</div>
                                <div class="text-xs text-green-400">Confirmed • 2 days ago</div>
                            </div>
                        </div>
                        <div class="text-sm text-green-400">+$100.00</div>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg"
                        style="background: #121627; border: 1px solid #2f3a66; box-shadow: 0 0 10px rgba(79, 142, 247, 0.2);">
                        <div class="flex items-center">
                            <div
                                class="bg-blue-900 text-blue-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                <i class="fas fa-coins text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-blue-200">Daily ROI</div>
                                <div class="text-xs text-blue-400">Today • 12:30 PM</div>
                            </div>
                        </div>
                        <div class="text-sm text-green-400">+$2.00</div>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg"
                        style="background: #121627; border: 1px solid #462d66; box-shadow: 0 0 10px rgba(127, 90, 226, 0.2);">
                        <div class="flex items-center">
                            <div
                                class="bg-purple-900 text-purple-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                <i class="fas fa-users text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-purple-200">Referral Earnings</div>
                                <div class="text-xs text-purple-400">Yesterday • 3:45 PM</div>
                            </div>
                        </div>
                        <div class="text-sm text-green-400">+$5.00</div>
                    </div>
                </div> --}}
                <p class="flex justify-center">Empty...</p>

            </div>

            <div class="rounded-xl p-6"
                style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
              border: 2px solid #f87171; /* red border */
              box-shadow: 0 0 15px 3px rgba(248, 113, 113, 0.35);">
                <h2 class="text-xl font-bold mb-6 flex items-center text-white">
                    <i class="fas fa-wallet mr-2 text-red-400"></i> Withdraw Earnings
                </h2>
                <div class="space-y-4">
                    <div style="background: #121627; border: 1px solid #7f1d1d; box-shadow: 0 0 10px rgba(248, 113, 113, 0.25); border-radius: 12px;"
                        class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-red-300">Available Balance</span>
                            <span class="font-bold text-green-400" id="withdraw-balance">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-sm text-red-300 mb-4">
                            <span>Minimum: $1.00</span>
                            <span>Max 1 withdrawal per day</span>
                        </div>
                        <div class="mb-4">
                            <label for="withdraw-amount" class="block text-sm font-medium text-red-300 mb-1">Amount
                                (USDT)</label>
                            <input type="number" id="withdraw-amount" min="1" step="0.01"
                                class="w-full bg-gray-900 border border-red-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                placeholder="Enter amount" />
                        </div>
                        <div class="mb-4">
                            <label for="withdraw-address" class="block text-sm font-medium text-red-300 mb-1">Your
                                USDT Address</label>
                            <input type="text" id="withdraw-address"
                                class="w-full bg-gray-900 border border-red-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                placeholder="Enter your TRC20 or BEP20 address" />
                        </div>
                        <div class="mb-4">
                            <label for="withdraw-network"
                                class="block text-sm font-medium text-red-300 mb-1">Network</label>
                            <select id="withdraw-network"
                                class="w-full bg-gray-900 border border-red-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option value="TRC20">TRC20 (Recommended)</option>
                                <option value="BEP20">BEP20</option>
                            </select>
                        </div>
                        <button onclick="requestWithdrawal()"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                            Request Withdrawal
                        </button>
                    </div>
                    {{-- <div style="background: #121627; border: 1px solid #7f1d1d; box-shadow: 0 0 10px rgba(248, 113, 113, 0.25); border-radius: 12px;"
                        class="p-4">
                        <h3 class="text-md font-medium mb-2 text-red-300">Last Withdrawal</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm text-red-200">$5.00 USDT (TRC20)</div>
                                <div class="text-xs text-red-400">Pending • 12 hours ago</div>
                            </div>
                            <div class="text-yellow-400">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Spinner Modal --}}
    <div id="spinnerModal" class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- Keep translucent dark overlay so website shows behind -->
        <div class="absolute inset-0 bg-black bg-opacity-70"></div>

        <!-- Only the modal box has #10172D -->
        <div class="bg-[#10172D] rounded-xl shadow-2xl relative z-10 w-full max-w-md mx-4 p-8 text-center text-white">
            <div class="mb-8">
                <h2 class="text-3xl font-bold mb-2 text-white glow-text">Welcome to TryMe!</h2>
                <p class="text-white glow-text">Spin the wheel to claim your signup bonus</p>
            </div>

            <div class="spinner">
                <div class="spinner-arrow">
                    <i class="fas fa-caret-down"></i>
                </div>
                <div class="spinner-wheel" id="spinnerWheel">
                    <div class="spinner-item" style="--rotate: 0deg; --bg:#6d28d9;"><span>$1</span></div>
                    <div class="spinner-item" style="--rotate: 45deg; --bg:#3b82f6;"><span>$0.5</span></div>
                    <div class="spinner-item" style="--rotate: 90deg; --bg:#6d28d9;"><span>$0.1</span></div>
                    <div class="spinner-item" style="--rotate: 135deg; --bg:#3b82f6;"><span>$5</span></div>
                    <div class="spinner-item" style="--rotate: 180deg; --bg:#6d28d9;"><span>$3</span></div>
                    <div class="spinner-item" style="--rotate: 225deg; --bg:#3b82f6;"><span>$2</span></div>
                    <div class="spinner-item" style="--rotate: 270deg; --bg:#6d28d9;"><span>$25</span></div>
                    <div class="spinner-item" style="--rotate: 315deg; --bg:#3b82f6;"><span>$50</span></div>
                </div>
                <button id="spinButton" class="spinner-button">SPIN</button>
            </div>

            <p class="text-center text-white mt-6 glow-text">
                Your bonus will be applied as a discount on your first package purchase.
            </p>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-darker py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center space-y-6 text-center max-w-xl mx-auto">
                <!-- Logo -->
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-28 h-auto">

                <!-- Description -->
                <p class="text-gray-300 text-lg">
                    Smart crypto investment platform with daily returns and multi-level referral system.
                </p>

                <!-- Social Icons -->
                <div class="flex space-x-8 text-2xl">
                    <a href="https://www.youtube.com/@TRYMENEWERA?sub_confirmation=1" target="_blank"
                        class="text-gray-400 hover:text-accent transition" aria-label="Youtube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://x.com/TRYMENEWERA" target="_blank"
                        class="text-gray-400 hover:text-accent transition" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/trymenewera/" target="_blank"
                        class="text-gray-400 hover:text-accent transition" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@trymeofficial_" target="_blank"
                        class="text-gray-400 hover:text-accent transition" aria-label="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="mailto:tryme@gmail.com" class="text-gray-400 hover:text-accent transition"
                        aria-label="Email">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a href="tel:+01234567890" class="text-gray-400 hover:text-accent transition" aria-label="Call">
                        <i class="fa fa-phone"></i>
                    </a>
                    <a href="https://wa.me/01234567890" target="_blank"
                        class="text-gray-400 hover:text-accent transition" aria-label="Whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400 mt-12">
                <p>&copy; 2023 Try Me. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script>
        // Spinner Modal Logic
        const spinnerModal = document.getElementById('spinnerModal');
        const spinButton = document.getElementById('spinButton');
        const spinnerWheel = document.getElementById('spinnerWheel');
        const dashboard = document.getElementById('dashboard'); // Make sure this exists

        let currentRotation = 0;

        spinButton.addEventListener('click', () => {
            spinButton.disabled = true;

            const prizes = ['$0.1', '$0.5', '$1', '$2', '$3', '$5', '$25', '$50'];
            const possibleWins = ['$1', '$5'];
            const winPrize = possibleWins[Math.floor(Math.random() * possibleWins.length)];
            const prizeIndex = prizes.indexOf(winPrize);

            const segmentAngle = 360 / prizes.length;
            const spins = 5;
            const targetAngle = (360 - (prizeIndex * segmentAngle + segmentAngle / 2)) % 360;

            currentRotation += spins * 360 + targetAngle;
            spinnerWheel.style.transform = `rotate(${currentRotation}deg)`;

            setTimeout(() => {
                alert(`🎉 Congratulations! You won ${winPrize} signup bonus!`);
                document.getElementById('winner-heading').textContent =
                    `Congratulations! You won ${winPrize} signup bonus!`;
                spinnerModal.classList.add('hidden');
                dashboard.classList.remove('hidden');
            }, 4000); // Matches the 4s transition


        });
    </script>


    {{-- copy to clipboard functionality --}}

    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert("Copied to clipboard!");
            }).catch(err => {
                console.error("Failed to copy text: ", err);
            });
        }

        const referralLink = @json($referralLink);

        function shareReferralLink(link) {
            if (navigator.share) {
                navigator.share({
                    title: 'Join me with this referral link!',
                    url: link
                });
            } else {
                alert("Sharing not supported on this device.");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            new QRCode(document.getElementById("qr-code"), {
                text: referralLink,
                width: 128,
                height: 128,
                colorDark: "#9b5de5",
                colorLight: "#121627",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    </script>



    <script>
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
        investmentAmount.addEventListener('input', updateCalculator);
        investmentPeriod.addEventListener('input', updateCalculator);
        referralCount.addEventListener('input', updateCalculator);

        function updateCalculator() {
            const amount = parseFloat(investmentAmount.value);
            const period = parseInt(investmentPeriod.value);
            const referrals = parseInt(referralCount.value);

            currentAmount.textContent = `$${amount}`;
            currentPeriod.textContent = `${period} days`;
            currentReferrals.textContent = referrals;

            const daily = amount * 0.02;
            const total = daily * period;
            const refIncome = amount * referrals * 0.01;
            const totalEarn = total + refIncome;

            dailyRoi.textContent = `$${daily.toFixed(2)}`;
            totalRoi.textContent = `$${total.toFixed(2)}`;
            referralIncome.textContent = `$${refIncome.toFixed(2)}`;
            totalEarnings.textContent = `$${totalEarn.toFixed(2)}`;
        }

        // Initialize calculator
        updateCalculator();

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

</body>

</html>
