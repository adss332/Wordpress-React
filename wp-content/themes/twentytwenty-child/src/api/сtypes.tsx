import * as element from '@wordpress/element';
import axios from 'axios';
import { TermsCheckBoxes } from '../Interfaces/checkBoxesTermsInterface';

const wp: {
  element: typeof import("@wordpress/element");
} = { element };
const { useState, useEffect } = wp.element;

export function useCtypes() {
  const [ ctypes, setCtypes ] = useState<TermsCheckBoxes>([]);
  const [ loading, setLoading ] = useState(false);
  const [ error, setError ] = useState(false);

  async function getCtypes() {
    try {
      setLoading(true);
      const response = await axios.get<TermsCheckBoxes[]>('/wp-json/courses/v1/getctypes');
      setLoading(false);
      setCtypes(response.data);
    } catch (e: unknown) {
      setError(true);
    }
  }

  useEffect(() => {
    getCtypes();
  }, [])

  return { ctypes };
}