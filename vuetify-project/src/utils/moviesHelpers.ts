export const debounce = <F extends (...args: any[]) => void>(func: F, delay: number): ((...args: Parameters<F>) => void) => {
    let timeoutId: NodeJS.Timeout;
  
    return function (...args) {
      clearTimeout(timeoutId);
  
      timeoutId = setTimeout(() => {
        func.apply(this, args);
      }, delay);
    };
  }
  
export const convertData = (data: any[]) => {
    return data.map((el) => ({
      poster: el.Poster,
      title: el.Title,
      year: el.Year,
      isFavourite: false,
    }));
  }