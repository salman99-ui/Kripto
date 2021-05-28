<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		.container{
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		.body{
			width: 500px;
			border: 3px solid grey;
			display: flex;
			flex-direction: column;
			padding: 20px;

		}

		.body h4{
			font-size: 20px;
			font-weight: 600;
			font-family: sans-serif;
			text-align: center;
		}

		.body p {
			font-size: 26px;
			color: green;
			font-weight: 700;
			font-family: sans-serif;
			letter-spacing: 1px;
			text-align: center;
		}

		.body input{
			padding: 10px;
			border: 2px solid grey;
			
			margin-bottom: 30px;
		}

		.body .value{
			display: flex;
			flex-direction: row;
			justify-content: space-around;
		}

		.body .action{
			display: flex;
			flex-direction: row;
			justify-content: space-around;

		}

		.body .action button:nth-child(1){
			border-radius: 10px;
			width: 200px;
			padding: 20px 10px;
			background-color: green;
			margin-bottom: 20px;
			color: white;
		}


		.body .action button:nth-child(2){
			border-radius: 10px;
			color: white;
			width: 200px;
			padding: 20px 10px;
			background-color: green;
			margin-bottom: 20px;
			
		}

	</style>
</head>
<body>
<div class="container">
	<div class="body">
		<h4>Input Plain Teks</h4>
		<input type="text" name="" id="value">

		<div class="value">
			<input type="number" placeholder="Nilai A" id="A" name="">
			<input type="number" placeholder="Nilai B" id="B" name="">
		</div>
		<div class="action">
			<button onclick="handleEncrypt()">ENCRYPT</button>
			<button onclick="handleDecrypt()">DECRYPT</button>
		</div>

		<h4>Hasil</h4>
		<p id="result">sadlaosc casansab</p>
	</div>
</div>

<script type="text/javascript">
	var nilaiA = document.getElementById('A')
	var nilaiB = document.getElementById('B')

	var abc = "abcdefghijklmnopqrstuvwxyz"

const decrypt = (str , a , b) => {
    var teks = [] 
    var chiper = str.toLowerCase().split("").reverse().join("")
    var value = inverse(a)

    for(let x of chiper){

        if(x == " "){
            teks.push(" ")
            continue
        }

        teks.push(charDecrypt(x , a , b , value))
    }

    return teks.join("")
}

const charEncrypt = (char , a , b) => {

    if(char == " ") return " "

    return abc.charAt(( a * abc.indexOf(char) + b) % 26)

}

const charDecrypt = (char , a , b , value) => {
    
    var nilai = value * (abc.indexOf(char) - b)

    if(nilai < 0){
        while( nilai < 0 ){
            nilai+= 26
        } 

        return abc.charAt(nilai)

    }

    return abc.charAt(nilai % 26)
    
}

const inverse = (value) => {
    var counter = 0
    while(true){
        counter ++ 
        if ( ( value * counter ) % 26 == 1 ){ 
            return counter 
            break
        } 
    }
}

const encrypt = (str , a , b) => {
    var plainteks = str.toLowerCase()
    var chiper = []

    plainteks = plainteks.split("").reverse().join("")
    
    for(let x of plainteks){
        if(x == " "){
            chiper.push(" ")
            continue
        }

        chiper.push(charEncrypt(x , a , b))
    }

    return chiper.join("")
}



const handleEncrypt = () => {
	var NilaiA = parseInt(nilaiA.value)
	var NilaiB = parseInt(nilaiB.value)

	var value = document.getElementById('value').value 
	var result = document.getElementById('result').innerHTML = " " + encrypt(value , NilaiA , NilaiB) + " " 
	
}

const handleDecrypt = () => {
	var NilaiA = parseInt(nilaiA.value)
	var NilaiB = parseInt(nilaiB.value)

	var value = document.getElementById('value').value 
	var result = document.getElementById('result').innerHTML = " " + decrypt(value , NilaiA , NilaiB) + " "
}



</script>
</body>
</html>