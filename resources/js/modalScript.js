;(function () {
  const modalTrigger = document.querySelectorAll('.modal-trigger')
  const modalCloseTrigger = document.querySelectorAll(
    '.modal-close-trigger'
  )
  const closeProductModal = document.getElementById(
    'close-product-modal'
  )

  const toggleModal = (element) => {
    element.classList.toggle('hidden')
  }

  modalTrigger.forEach((modal) => {
    let currentTarget = modal.dataset.buttonTarget
    modal.addEventListener('click', (e) => {
      let currentModal = document.getElementById(currentTarget)
      toggleModal(currentModal)
    })
  })

  modalCloseTrigger.forEach((modal) => {
    let currentTarget = modal.dataset.modalTarget
    modal.addEventListener('click', (e) => {
      let currentModal = document.getElementById(currentTarget)
      toggleModal(currentModal)
    })
  })
})()
