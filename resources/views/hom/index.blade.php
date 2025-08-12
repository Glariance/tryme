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
                        primary: '#6c5ce7',
                        secondary: '#a29bfe',
                        dark: '#1a1a2e',
                        darker: '#16213e',
                        accent: '#00cec9',
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
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
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
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="gradient-bg text-white min-h-screen font-sans">
    <!-- Navigation -->
<nav class="container mx-auto px-4 py-6 flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <i class="fas fa-coins text-2xl text-accent"></i>
        <span class="text-xl font-bold">Crypto<span class="text-accent">Earn</span></span>
    </div>
    <div class="hidden md:flex space-x-8">
        <a href="#home" class="hover:text-accent transition">Home</a>
        <a href="#features" class="hover:text-accent transition">Features</a>
        <a href="#how-it-works" class="hover:text-accent transition">How It Works</a>
        <a href="#faq" class="hover:text-accent transition">FAQ</a>
    </div>
    <div class="flex space-x-4 items-center">
        {{-- <button id="connectWalletBtn" class="bg-accent hover:bg-opacity-80 px-6 py-2 rounded-full font-medium transition">
            Connect Wallet
        </button> --}}
        <a href="javascript:void(0);" onclick="toggleAuthModal('signup')" class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
            Signup
        </a>
        <a href="javascript:void(0);" onclick="toggleAuthModal('login')" class="bg-accent hover:bg-gray-300 px-4 py-2 rounded-full font-medium transition">
            Login
        </a>
    </div>
    <button class="md:hidden">
        <i class="fas fa-bars text-xl"></i>
    </button>
</nav>

    <!-- Hero Section -->
    <section id="home" class="container mx-auto px-4 py-16 md:py-24 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-12 md:mb-0">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Smart Crypto <span class="text-accent">Investment</span> Platform
            </h1>
            <p class="text-lg text-gray-300 mb-8">
                Earn daily rewards up to 2% on your investment and additional income from referrals.
                Join thousands of investors growing their crypto portfolio with us.
            </p>
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <button id="investNowBtn" class="bg-accent hover:bg-opacity-80 px-8 py-3 rounded-full font-medium transition">
                    Start Earning Now
                </button>
                <button class="border border-accent text-accent hover:bg-accent hover:bg-opacity-10 px-8 py-3 rounded-full font-medium transition">
                    How It Works
                </button>
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
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-primary rounded-full filter blur-3xl opacity-20 animate-pulse-slow"></div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-accent rounded-full filter blur-3xl opacity-20 animate-pulse-slow"></div>
                <div class="glass-card p-8 rounded-2xl relative z-10">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="text-gray-300">Current APY</div>
                            <div class="text-3xl font-bold text-accent">730%</div>
                        </div>
                        <div class="w-16 h-16 bg-accent bg-opacity-10 rounded-full flex items-center justify-center">
                            <i class="fas fa-coins text-3xl text-accent"></i>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-300 mb-2">
                            <span>Daily ROI</span>
                            <span>2%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-accent h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-300 mb-2">
                            <span>Direct Referral</span>
                            <span>1%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between text-sm text-gray-300 mb-2">
                            <span>Level 2 Referral</span>
                            <span>0.5%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-secondary h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <button class="w-full bg-primary hover:bg-opacity-80 py-3 rounded-full font-medium transition">
                        Connect Wallet to Invest
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-darker">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose <span class="text-accent"> Try Me</span></h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Our platform offers the most competitive rates and secure investment opportunities in the crypto space.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-accent bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-percentage text-2xl text-accent"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Daily 2% ROI</h3>
                    <p class="text-gray-300">Earn consistent daily returns on your investment with our proven strategy.</p>
                </div>
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Multi-Level Referrals</h3>
                    <p class="text-gray-300">Earn 1% from direct referrals and 0.5% from their referrals.</p>
                </div>
                <div class="glass-card p-6 rounded-xl hover:translate-y-2 transition">
                    <div class="w-14 h-14 bg-success bg-opacity-10 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-lock text-2xl text-success"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Secure & Transparent</h3>
                    <p class="text-gray-300">All transactions are recorded on the blockchain for full transparency.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How It <span class="text-accent">Works</span></h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Start earning in just a few simple steps.</p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-accent bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-accent bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-accent">1</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Connect Wallet</h3>
                    <p class="text-gray-300">Connect your MetaMask or WalletConnect wallet to get started.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-primary bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-primary">2</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Make Investment</h3>
                    <p class="text-gray-300">Invest a minimum of $10 in USDT, BUSD or BNB.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-secondary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-secondary bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-secondary">3</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Earn Daily ROI</h3>
                    <p class="text-gray-300">Start earning 2% daily return on your investment.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-success bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-16 h-16 bg-success bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-success">4</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Withdraw Profits</h3>
                    <p class="text-gray-300">Withdraw your earnings anytime after 24 hours.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Calculator -->
    <section class="py-16 bg-darker">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto glass-card p-8 rounded-xl">
                <h2 class="text-3xl font-bold mb-6 text-center">Investment <span class="text-accent">Calculator</span></h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Investment Amount ($)</label>
                            <input type="range" min="10" max="10000" value="500" step="10" class="w-full" id="investmentAmount">
                            <div class="flex justify-between mt-2">
                                <span>$10</span>
                                <span id="currentAmount">$500</span>
                                <span>$10,000</span>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Investment Period (days)</label>
                            <input type="range" min="1" max="365" value="30" class="w-full" id="investmentPeriod">
                            <div class="flex justify-between mt-2">
                                <span>1 day</span>
                                <span id="currentPeriod">30 days</span>
                                <span>365 days</span>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2">Referrals (direct)</label>
                            <input type="range" min="0" max="50" value="5" class="w-full" id="referralCount">
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
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Frequently Asked <span class="text-accent">Questions</span></h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Find answers to common questions about our platform.</p>
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="glass-card p-6 rounded-xl mb-4">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="text-lg font-bold">What is the minimum investment amount?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300">
                        The minimum investment amount is $10 in USDT, BUSD or BNB. There is no maximum investment limit.
                    </div>
                </div>
                <div class="glass-card p-6 rounded-xl mb-4">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="text-lg font-bold">How often can I withdraw my earnings?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300">
                        You can withdraw your earnings once every 24 hours. The minimum withdrawal amount is $1.
                    </div>
                </div>
                <div class="glass-card p-6 rounded-xl mb-4">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="text-lg font-bold">How does the referral system work?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300">
                        You earn 1% from direct referrals' investments and 0.5% from their referrals (level 2).
                        Your referral link is automatically generated when you connect your wallet.
                    </div>
                </div>
                <div class="glass-card p-6 rounded-xl mb-4">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="text-lg font-bold">Is there any risk involved?</h3>
                        <i class="fas fa-chevron-down text-gray-300"></i>
                    </div>
                    <div class="mt-4 text-gray-300">
                        Like all investments, there are risks involved. However, our platform uses proven strategies
                        to minimize risk and maximize returns. We recommend only investing what you can afford to lose.
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
                <button class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/metamask-logo.png" alt="MetaMask" class="w-8 h-8 mr-3">
                        <span>MetaMask</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/walletconnect-logo.png" alt="WalletConnect" class="w-8 h-8 mr-3">
                        <span>WalletConnect</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="w-full flex items-center justify-between p-4 rounded-xl bg-gray-800 hover:bg-gray-700 transition">
                    <div class="flex items-center">
                        <img src="https://cryptologos.cc/logos/trust-wallet-twt-logo.png" alt="Trust Wallet" class="w-8 h-8 mr-3">
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
    <div id="investmentModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
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
                    <button class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="USDT" class="w-6 h-6 mr-2">
                        USDT
                    </button>
                    <button class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/binance-usd-busd-logo.png" alt="BUSD" class="w-6 h-6 mr-2">
                        BUSD
                    </button>
                    <button class="flex-1 py-2 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition flex items-center justify-center">
                        <img src="https://cryptologos.cc/logos/bnb-bnb-logo.png" alt="BNB" class="w-6 h-6 mr-2">
                        BNB
                    </button>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Investment Amount ($)</label>
                <div class="relative">
                    <input type="number" min="10" value="100" class="w-full bg-gray-800 rounded-lg py-3 px-4 pr-16">
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
                        <input type="number" min="10" value="50" class="w-full bg-gray-800 rounded-lg py-2 px-4">
                    </div>
                    <button class="w-full bg-accent hover:bg-opacity-80 py-2 rounded-lg font-medium transition">
                        Invest Now
                    </button>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold mb-4">Withdraw Earnings</h3>
                    <div class="mb-4">
                        <label class="block text-gray-300 mb-2">Amount (USDT)</label>
                        <input type="number" min="1" value="0" class="w-full bg-gray-800 rounded-lg py-2 px-4" id="withdrawAmount">
                    </div>
                    <button class="w-full bg-success hover:bg-opacity-80 py-2 rounded-lg font-medium transition" id="withdrawBtn">
                        Withdraw
                    </button>
                    <div class="text-xs text-gray-400 mt-2" id="nextWithdrawal">Next withdrawal available in 24h 0m 0s</div>
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
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 mt-4">
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
                                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <label for="signup-email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                                {{-- <input type="email" id="signup-email"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                    <x-text-input id="email" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            <div>
                                <label for="signup-phone"
                                    class="block text-sm font-medium text-gray-300 mb-1">Phone</label>
                                {{-- <input type="text" id="signup-phone"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                    <x-text-input id="phone" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="name" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"/>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <label for="signup-password"
                                    class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                                {{-- <input type="password" id="signup-password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}
                                    <x-text-input id="password" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            <div>
                                <label for="signup-confirm-password"
                                    class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                                {{-- <input type="password" id="signup-confirm-password"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"> --}}

                                    <x-text-input id="password_confirmation" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            <div>
                                <label for="signup-referral"
                                    class="block text-sm font-medium text-gray-300 mb-1">Referral
                                    Code (Optional)</label>
                                <input type="text" id="signup-referral" name="referral_code" required class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div class="flex items-center mt-4">
                                <input id="terms" type="checkbox"
                                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-600 rounded bg-gray-700">
                                <label for="terms" class="ml-2 block text-sm text-gray-300">I agree to the <a0
                                        href="javascript:void(0);" class="text-purple-400 hover:text-purple-300">Terms & Conditions</a></label>
                            </div>
                            <button type="submit"
                                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 mt-4">
                                Create Account
                            </button>
                            <div class="text-center text-sm text-gray-400">
                                Already have an account? <button onclick="toggleAuthForm('login')"
                                    class="text-blue-400 hover:text-blue-300">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-darker py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-coins text-2xl text-accent"></i>
                        <span class="text-xl font-bold">Crypto<span class="text-accent">Earn</span></span>
                    </div>
                    <p class="text-gray-300">
                        Smart crypto investment platform with daily returns and multi-level referral system.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Features</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">How It Works</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Risk Disclosure</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-envelope mr-2"></i> support@ Try Me.com
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fab fa-telegram mr-2"></i> @ Try Mesupport
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2023  Try Me. All rights reserved.</p>
            </div>
        </div>
    </footer>



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
                connectWalletBtn.innerHTML = `<i class="fas fa-wallet mr-2"></i> ${userData.walletAddress.substring(0, 6)}...${userData.walletAddress.substring(38)}`;
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
                    alert(`You can only withdraw once every 24 hours. Next withdrawal available in ${Math.floor(24 - hoursSinceLastWithdrawal)} hours.`);
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
            walletAddress.textContent = `${userData.walletAddress.substring(0, 6)}...${userData.walletAddress.substring(38)}`;
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



