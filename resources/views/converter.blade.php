<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Converter</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        select, input {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
        }
        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Crypto Converter</h1>
    <form action="{{ route('convert') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" required value="{{ old('amount', $amount ?? '') }}">
        </div>

        <div class="form-group">
            <label for="from">From:</label>
            <select name="from" id="from" required>
                @foreach ($currencyOptions as $symbol => $name)
                    <option value="{{ $symbol }}" {{ (isset($from) && $from === $symbol) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="to">To:</label>
            <select name="to" id="to" required>
                @foreach ($currencyOptions as $symbol => $name)
                    <option value="{{ $symbol }}" {{ (isset($to) && $to === $symbol) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Convert</button>
    </form>

    @if(isset($result))
        <h2>Result:</h2>
        <p>{{ $amount }} {{ $from }} = {{ $result['data']['quote'][$to]['price'] }} {{ $to }}</p>
    @endif
</body>
</html>