let bodyPosition = 0;

export const freezeBody = () => {
  const doc = document.documentElement;
  bodyPosition = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

  document.body.style.overflow = 'hidden';
  document.body.style.position = 'fixed';
  document.body.style.left = '0';
  document.body.style.top = Math.abs(bodyPosition) * -1 + 'px';
  document.body.style.right = '0';
};

export const unfreezeBody = () => {
  document.body.style.overflow = 'auto';
  document.body.style.position = 'static';
  window.scrollTo(0, bodyPosition);
  bodyPosition = 0;
};
