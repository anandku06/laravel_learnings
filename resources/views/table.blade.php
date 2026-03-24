<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <!-- Multiplication Table of user input number -->
    <h1>Multiplication Table of {{ $number ?? 2 }}</h1>
    <table border="1">
        <tr>
            <th>Multiplier</th>
            <th>Result</th>
        </tr>
        @for ($i = 1; $i <= 20; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ ($number ?? 2) * $i }}</td>
            </tr>
        @endfor
    </table>
</div>
