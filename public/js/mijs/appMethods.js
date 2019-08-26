
let likeAsync = ( e ) => {
    e.preventDefault();
    let btnLike = document.getElementById('likeRef');
    let btnDislike = document.getElementById('dislikeRef');
    let newurl = 'http://localhost:8000/image';        
    let icon;
    let id = location.href[location.href.length - 1];
    let clase = 'fa-2x fa-heart col-5 col-sm-5 col-md-5 col-lg-4 col-xl-3  pr-0';

    if( !btnDislike ) {        
        icon = btnLike; 
        clase = `${ clase } fas`;
        icon.setAttribute('id','dislikeRef');
        newurl = `${ newurl }/dislike/${ id }`;        

    } else {        
        icon = btnDislike; 
        clase = `${ clase } far`;
        icon.setAttribute('id','likeRef');
        newurl = `${ newurl }/like/${ id }`;        
    }
   

    fetch( icon.getAttribute('href') )
    .then( async response => {
        let data = await response.json();
        /* Seteamos la nueva url  */
        icon.setAttribute('href', newurl);

        /* agregamos la nueva clase al icono */
        icon = icon.parentElement;
        icon.className = clase;       

        if( !response.ok ) {
            return 0;
        }     
    })    
    .catch( err => console.log( err ) );
}

let comment = ( e ) => {
    e.preventDefault();

    let formaCom = document.getElementById('formaCom');

    if( formaCom.style.display == 'block') {
        formaCom.style.display = 'none';
    } else {
        formaCom.style.display = 'block';

    }
}