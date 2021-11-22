/**
 * JS puro
 */

document.addEventListener('DOMContentLoaded', () => {
    const btns = document.getElementsByClassName('window-open')

    for (let i=0; i<btns.length; i++) {
        console.log(btns[i].attributes.id.value)
        document.getElementById(btns[i].attributes.id.value).addEventListener('click', ()=>{
            document.querySelector('.window-msg').classList.remove('disable')
    
            let title_ = document.querySelector('.id + .title_').innerHTML
            document.querySelector('.window-msg .title_').innerHTML = title_
    
            let id_ = document.querySelector(`#${btns[i].attributes.id.value} + .event_id`).innerHTML
            document.querySelector('.window-msg form').setAttribute('action', `/events/leave/${id_}`)
            document.querySelector('.window-msg form a').setAttribute('href', `/events/leave/${id_}`)
        })
        document.querySelector('.window-menu > ion-icon').addEventListener('click', ()=>{
            document.querySelector('.window-msg').classList.add('disable')
            document.querySelector('.window-msg .title_').innerHTML = ''
            document.querySelector('.window-msg form').setAttribute('action', '')
            document.querySelector('.window-msg form a').setAttribute('href', '')
        })
    }
})

