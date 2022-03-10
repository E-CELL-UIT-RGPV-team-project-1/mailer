const box_one = document.getElementById("box_one");
const file = document.getElementById("file");

function convert(e) {
    console.log('fun 1 is working');

    //e.preventDefault();
    const input = file.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        console.log('fun onload is working');
        const text = e.target.result;
        //document.write(text);
    };

    reader.readAsText(input);

    function csvToArray(str, delimiter = ",") {
        console.log('fun 2 is working');
        // slice from start of text to the first \n index
        // use split to create an array from string by delimiter
        headers = str.slice(0, str.indexOf("\n")).split(delimiter);

        // slice from \n index + 1 to the end of the text
        // use split to create an array of each csv value row
        // const rows = str.slice(str.indexOf("\n") + 1).split("\n");
        console.log(headers);

        for (let i = 0; i < headers.length; i++) {
            console.log('loop is working');
             
            const element = headers[i];
            console.log(element);

            
            document.write(`<label for="`+element+`" class="radio">
                <input type="radio" name ="radioname" id="`+element+`" class="radio-input">
                <div class="radio_radio"> </div>
                `+element+`
            </label>`); 

            

            //  var newradiolable =  document.createElement('label');
            //  newradiolable.setAttribute('for',element);
            //  newradiolable.setAttribute('type','text');
            //  newradiolable.setAttribute('class','radio');
    
            //  newradiolable.forEach(element => {
            //      var newradiolable =  document.createElement('input');
            //      newField.setAttribute('type','radio');
            //      newField.setAttribute('name','radiobtnname');
            //      newField.setAttribute('class','radiobtn');
            //      newField.setAttribute('id',element);
            //      file.appendChild(newradiolable);
            }
        }   
        


    

    reader.onload = function (e) {
        const text = e.target.result;
        const data = csvToArray(text);
        //document.write(JSON.stringify(data));
    };

    csvToArray();

    




    // now just need to transport this data (array of header) to radiobtn.js


}
